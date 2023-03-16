<?php

namespace App\Repositories;

use App\Models\Months;

class MonthsRepository
{
    //Lista los meses del año de manera dinamica
    // (Si estamos en febrero lista de febrero en adelante asi sucesivamente)

    /**
     * It returns an array of months starting from the current month
     *
     * @return An array of months that are greater than or equal to the current month.
     */
    public function getAll()
    {
        $currentMonth = date('n');
        $months = Months::all();
        $result = [];

        foreach ($months as $month) {
            if ($month['id'] >= $currentMonth) {
                array_push($result, $month['name']);
            }
        }

        return $result;
    }
}
