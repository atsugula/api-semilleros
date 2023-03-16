<?php

namespace App\Repositories;

use App\Http\Resources\V1\ClausesBaseCollection;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\BaseClauses;
use App\Traits\FunctionGeneralTrait;
use App\Traits\UserDataTrait;
class ClausesBaseRepository implements CrudRepositoryInterface{

    use FunctionGeneralTrait, UserDataTrait;

   /**
    * It returns all the clauses in the database.
    *
    * @return A collection of all the clauses in the database.
    */
    public function getAll()
    {
        $results = new ClausesBaseCollection(BaseClauses::all());
        return $results;
    }

   /**
    * It creates a new base clause.
    *
    * @param request The request object from the controller
    *
    * @return The baseClause object
    */
    public function create($request)
    {
        $baseClause = BaseClauses::create($request);
        return $baseClause;
    }

   /**
    * It finds the base clause by id.
    *
    * @param id The id of the base clause you want to find.
    *
    * @return The base clause with the id that was passed in.
    */
    public function findById($id)
    {
        $baseClause = BaseClauses::findOrFail($id);
        return $baseClause;
    }

    /**
     * It updates the base clause with the data and id passed in.
     *
     * @param data The data to be updated.
     * @param id The id of the record you want to update.
     *
     * @return The updated baseClause.
     */
    public function update($data, $id)
    {
        $baseClause = BaseClauses::findOrFail($id);
        $baseClause->update($data);
        $baseClause->save();

        return $baseClause;
    }

   /**
    * It deletes a base clause.
    *
    * @param id The id of the base clause to be deleted.
    *
    * @return A JSON object with the message "Se ha eliminado correctamente"
    */
    public function delete($id)
    {
        $baseClause = BaseClauses::findOrFail($id);
        $baseClause->delete();

        return response()->json(['message' => 'Se ha eliminado correctamente']);
    }


}
