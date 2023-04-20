<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PsychologistVisits extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $table = "psychological_visits";

    protected $fillable = [
        'scenery',
        'number_beneficiaries',
        'beneficiaries_knows_project',
        'beneficiaries_knows_monthly_value',
        'monitor_organization_discipline_management',
        'description',
        'observations',
        'objetive',
        'evidence',
        'municipalities_id',
        'diciplines_id',
        'monitor_id',
        'created_by',
        'reviewed_by',
        'status_id',
        'rejection_message',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];


    public function municipalities()
    {
        return $this->belongsTo(Municipality::class, 'municipalities_id');
    }
    public function disciplines()
    {
        return $this->belongsTo(Disciplines::class, 'diciplines_id');
    }

    public function monitor()
    {
        return $this->belongsTo(User::class, 'monitor_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function revisedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function control_data()
    {
        return $this->morphMany(ControlChangeData::class, 'data_model');
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
