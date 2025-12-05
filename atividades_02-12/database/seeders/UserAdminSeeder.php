<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Mavi',
            'email'=>'maviaelmelo330@gmail.com',
            'password'=>'12345678',
            'role'=>'admin'
        ]);
    }
}
