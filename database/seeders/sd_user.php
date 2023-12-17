<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TableUser;
use Illuminate\Support\Facades\Hash;

class sd_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ngDung = new TableUser();
        $ngDung->id_role = 1;
        $ngDung->name = 'Admin';
        $ngDung->gender = 1;
        $ngDung->birthday = date("Y-m-d");
        $ngDung->email = 'admin@gmail.com';
        $ngDung->phone = '0000000000';
        $ngDung->address = 'Không biết';
        $ngDung->avatar = '';
        $ngDung->username = 'admin';
        $ngDung->password = Hash::make('123456');
        $ngDung->remember_token ='';
        $ngDung->save();
    }
}
