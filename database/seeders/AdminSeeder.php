<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        User::create([
            'name' => 'Administrator',
            'mobile' => '8989898989',
            'manager_store_id'=>Null,
            'sales_store_id'=>Null,
            'role'=>1,
            'status'=>1,
            'image'=>'avatar.png',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
