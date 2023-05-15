<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BaseClauses;
use App\Models\Contractor;
use App\Models\Disciplines;
use App\Models\Ethnicity;
use App\Models\InfoContractor;
use App\Models\MethodologistVisitPersonalized;
use App\Models\MunicipalityUser;
use App\Models\UserHierarchy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ZoneSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            ModuleItemSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleUserSeeder::class,
            GroupSeeder::class,
            PermissionRoleSeeder::class,
            ValidityPeriodsSeeder::class,
            ProfileSeeder::class,
            DepartmentsSeeder::class,
            CitySeeder::class,
            StatusSeeder::class,
            BankSeeder::class,
            BankAccountTypeSeeder::class,
            // ContractorSeeder::class,
            // HiringSeeder::class,
            MunicipalitySeeder::class,
            // DocumentSeeder::class,
            //StatusDocumentSeeder::class,
            ObjectSeeder::class,
            // BaseClausesSeeder::class,
            // NameClausesSeeder::class,
            DisciplinesSeeder::class,
            // DirectionSeeder::class,
            DirectionSeeder::class,
            // ContractSeeder::class,
            // ClauseSeeder::class,
            ZoneUserSeeder::class,
            MunicipalityUserSeeder::class,
            // SpecificcontratoractivitySeeder::class,
            EthnicitySeeder::class,
            // UserHierarchySeeder::class,
            EventSupportSeederer::class,
            EvaluationSeeder::class,
            MonthsSeeder::class,
            MethodologistVisitPersonalizedSeeder::class,
            CoordinatorVisitSeeder::class,
            // InfoContractorSeeder::class,
            SidewalkSeeder::class,
            Health_Entities_Seeder::class,
            // DATA FAKE
            // DataFakeSeeder::class,
            RegionsSeeder::class,
            MunicipalitiesSeeder::class,
            RolesActivitiesSeeder::class,
            RolesObjectsActivitiesSeeder::class
        ]);
    }
}
