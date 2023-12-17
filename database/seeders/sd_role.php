<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TableRole;
use Illuminate\Support\Facades\DB;

class sd_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_role')->insert([
            [
                'name'=>'Admin'
            ],
            [
                'name'=>'User'
            ],
        ]);
    }
}
