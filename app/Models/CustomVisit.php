<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CustomVisit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "custom_visits";

    protected $fillable = [
        'theme',
        'agreements',
        'concept',
        'guardian_knows_semilleros',
        'file',
        'month_id',
        'municipality_id',
        'beneficiary_id',
        'created_by',
        'reviewed_by',
        'status_id',
        'reject_message',
    ];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function months()
    {
        return $this->belongsTo(Months::class, 'month_id');
    }

    public function municipalities()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function beneficiaries()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function revisedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function eps()
    {
        return $this->belongsTo(HealthEntities::class, 'health_entity_id');
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
