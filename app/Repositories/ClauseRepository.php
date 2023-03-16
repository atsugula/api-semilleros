<?php

namespace App\Repositories;

use App\Events\ClausesFilleds;
use App\Http\Resources\V1\ClauseCollection;
use App\Http\Resources\V1\ClauseResource;
use App\Models\Clause;
use App\Models\Contract;
use App\Models\Status;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;

class ClauseRepository
{
    use FunctionGeneralTrait, UserDataTrait;

    public function getAll()
    {
        $results = new ClauseCollection(Clause::orderBy('id', 'DESC')->get());
        return $results;
    }

    public function create($request)
    {
        $in_rev_status = Status::query()->where('slug', 'ENR')->get()->first();

        //~~ ACTUALIZAMOS EL CONTRATO CON SU FECHA CAP Y ESTADO EN REVISION
        $contract = Contract::query()->where('contractor_id', $request->contractor_id)->get()->first();
        $contract->update([
            'status' => $in_rev_status->id,
            'cap_date' => $request->cap_date,
        ]);
        $contract->save();

        //~~ SE CREAN LAS CLAUSULAS
        $request['contract_id'] = $contract->id;
        $clause_query = Clause::query()->where('contract_id', $contract->id);

        /**
         * Si ya existe solo se actualizan sus clausulas
         * Si no, se crean
         */
        if ($clause_query->first()) {
            $clause = $clause_query->get()->first();
            $clause->update($request->all());
            $clause->save();
        }
        else {
            $clause = Clause::create($request->all());
        }

        //~~ SE COLOCA AL CONTRATISTA EN REVISION
        ClausesFilleds::dispatch($clause);
        return $clause;
    }

    public function findById($id)
    {
        $clause = Clause::findOrFail($id);
        $result = new ClauseResource($clause);
        return $result;
    }

    public function findByContractor($id)
    {
        $contract = Contract::query()->where('contractor_id', $id)->get()->first();
        $clause = Clause::query()->where('contract_id', $contract->id)->get()->first();
        $result = [
            'clauses' => new ClauseResource($clause),
            'contract' => $contract
        ];
        return $result;
    }

    public function update($data, $id)
    {
        $clause = Clause::findOrFail($id);
        $clause->update($data);
        $clause->save();

        ClausesFilleds::dispatch($clause);
        return $clause;
    }

    public function delete($id)
    {
        $clause = Clause::findOrFail($id);
        $clause->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }

    public function control($request)
    {
        $in_rev_status = Status::query()->where('slug', 'ENR')->get()->first();

        //~~ ACTUALIZAMOS EL CONTRATO A ESTADO EN REVISION
        $contract = Contract::query()->where('contractor_id', $request->contractor_id)->get()->first();
        $contract->update([
            'status' => $in_rev_status->id,
        ]);

        //~~ SI SE RECHAZO LA FECHA CAP Y EL USUARIO LA ACTUALIZA
        if ($request->has('cap_date')) {
            $contract->update([
            'cap_date' => $request->cap_date,
            ]);
        }

        $contract->save();

        //~~ SE BUSCAN LAS CLAUSULAS
        $request['contract_id'] = $contract->id;
        $clause_query = Clause::query()->where('contract_id', $contract->id);

        /**
         * SE ACTUALIZAN LAS CLAUSULAS EDITADAS POR EL USUARIO
         */
        $clause = $clause_query->get()->first();
            $clause->update($request->all());
            $clause->save();

        //~~ SE COLOCA AL CONTRATISTA EN REVISION
        ClausesFilleds::dispatch($clause);
        return $clause;
    }
}
