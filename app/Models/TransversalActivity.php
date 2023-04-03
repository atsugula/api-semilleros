<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class TransversalActivity extends Model
{

    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = "transversal_activities";

    protected $fillable = [
        'date_visit',
        'nro_assistants',
        'activity_name',
        'objective_activity',
        'scene',
        'meeting_planing',
        'team_socialization',
        'development_activity',
        'content_network',
        'files_id',
        'municipality_id',
        'created_by',
        'reviewed_by',
        'status_id',
        'reject_message',
    ];

    protected $guarded = [
        'created_at', 'updated_at'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function control_data(){
		return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function municipalities(){
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function reviewed(){
		return $this->belongsTo(User::class, 'reviewed_by', 'id');
	}

    public function files()
    {
        return $this->hasMany(EvidenceFile::class, 'transversal_id', 'id');
    }

    public function statuses(){
		return $this->belongsTo(Status::class, 'status_id', 'id');
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
                'monitor_name' => function ($query) use ($searchValue) {
                    $query->whereHas('monitor', function ($query) use ($searchValue) {
                        $query->where('users.name', 'like', '%' . $searchValue . '%');
                    });
                },
                'sport_scene' => function ($query) use ($searchValue) {
                    $query->where('sport_scene', 'like', '%' . $searchValue . '%');
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
