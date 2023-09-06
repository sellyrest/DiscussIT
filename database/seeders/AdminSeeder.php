<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'admin',
            'fullname' => 'administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'nomor_telpon' => '08123456'
        ]);
    }
}
