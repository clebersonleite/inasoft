<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['nome' => 'INA Kids'],
            ['nome' => 'DJ'],
            ['nome' => 'Diaconato']
        ];

        DB::table('departments')->insert($departments);
    }
}
