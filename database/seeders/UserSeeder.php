<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++){
            User::create([
                'nama' =>  'user '.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => 'user'.$i.'123',
                'jkl' => 'L',
                'alamat' => 'fjnnsdjfhbsdjhf',
                'no_hp' => '08508656678',
            ]);
        }
    }
}
