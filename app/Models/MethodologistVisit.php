<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class MethodologistVisit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "methodologist_visits";

    protected $fillable = [
        'hour_visit',
        'date_visit',
        'sports_scene',
        'beneficiary_coverage',
        'swich_plans_r',
        'swich_plans_sc_1',
        'swich_plans_sc_2',
        'swich_plans_sc_3',
        'swich_plans_sc_4',
        'swich_plans_gm_1',
        'swich_plans_gm_2',
        'swich_plans_gm_3',
        'swich_plans_gm_4',
        'swich_plans_gm_5',
        'swich_plans_gm_6',
        'swich_plans_mp_1',
        'swich_plans_mp_2',
        'swich_plans_mp_3',
        'swich_plans_mp_4',
        'swich_plans_mp_5',
        'municipalitie_id',
        'sidewalk',
        'user_id',
        'discipline_id',
        'evaluation_id',
        'event_support_id',
        'observations',
        'status_id',
        'file',
        'created_by',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function municipalities(){
        return $this->belongsTo(Municipality::class, 'municipalitie_id');
    }

    public function event_supports(){
        return $this->belongsTo(Event_support::class, 'event_support_id');
    }

    public function evaluations(){
        return $this->belongsTo(Evaluation::class, 'evaluation_id');
    }

    public function disciplines(){
        return $this->belongsTo(Disciplines::class, 'discipline_id');
    }

    public function monitor(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function sidewalk(){
    //     return $this->belongsTo(Sidewalk::class, 'sidewalk');
    // }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getPublishedAtAttribute(){
        return $this->created_at->format('Y-m-d');
    }

    public function control_data(){
		return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function scopeFilterByUrl($query)
    {
        $this->searchFilter($query);

        $this->dateFilter($query);

        $this->statusFilter($query);

        return $query;
    }


    private function searchFilter($query)
    {
        if (request()->filled('search_field') && request()->filled('search_value')) {
            $searchField = request('search_field');
            $searchValue = request('search_value');

            $validSearchFields = [
                'id' => function ($query) use ($searchValue) {
                    $query->where('id', 'like', '%' . $searchValue . '%');
                },
                'date_visit' => function ($query) use ($searchValue) {
                    $query->where('date_visit', 'like', '%' . $searchValue . '%');
                },
                'municipality' => function ($query) use ($searchValue) {
                    $query->whereHas('municipalities', function ($query) use ($searchValue) {
                        $query->where('municipalities.name', 'like', '%' . $searchValue . '%');
                    });
                },
            ];

            if (array_key_exists($searchField, $validSearchFields)) {
                $validSearchFields[$searchField]($query);
            } else {
                $query->where($searchField, 'like', '%' . $searchValue . '%');
            }

        }
    }

    private function dateFilter($query)
    {
        if (request()->filled('date_criteria_start') && request()->filled('date_criteria_end')) {
            $startDate = request('date_criteria_start');
            $endDate = request('date_criteria_end');
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }

    private function statusFilter($query)
    {
        if (request()->filled('status_criteria')) {
            $searchValue = request('status_criteria');
            if ($searchValue !== 'all') {
                $query->whereHas('statuses', function ($query) use ($searchValue) {
                    $query->where('statuses.name', 'like', '%' . $searchValue . '%');
                });
            }
        }
    }
}
