<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class Chronogram extends Model
{
    use SoftDeletes, HasFactory, LogsActivity;

    protected $table = "chronograms";

    protected $fillable = [
        'created_by',
        'month',
        'municipality',
        'note',
        'note_holiday',
        'revised_by',
        'status_id',
        'updated_at'
    ];

    protected $hidden = ['created_at', 'deleted_at',];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function control_data(){
        return $this->morphMany(ControlChangeData::class,'data_model');
	}

    public function getPublishedAtAttribute(){
        return $this->created_at->format('Y-m-d');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function zones(){
        return $this->hasMany(ZoneUser::class, 'user_id', 'created_by');
    }

    public function reviewed(){
		return $this->belongsTo(User::class, 'revised_by', 'id');
	}

    public function mes(){
        return $this->hasOne(Months::class, 'id', 'month');
    }

    public function municipio(){
        return $this->hasOne(Municipality::class, 'id', 'municipality');
    }

    public function estado(){
        return $this->hasOne(Status::class, 'slug', 'status');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function groups(){
        return $this->hasMany(ChronogramsGroups::class, 'chronograms_id');
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
