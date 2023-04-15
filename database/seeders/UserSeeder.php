<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Jan',
            'surname' => 'Kowalski',
            'email' => 'jan@email.com',
            'password' => Hash::make('1234'),
            'address' => 'Lwowska 15, 35-312 Rzeszów',
            'nip' => 1234567890,
            'company' => 'JKGroup',
            'roleID' => 1,
        ]);

        $user = User::create([
            'name'=>'Adam',
            'surname' => 'Nowak',
            'email' => 'adam@email.com',
            'password' => Hash::make('1234'),
            'address' => 'Piłsudskiego 24, 35-100 Rzeszów',
            'nip' => 9876543210,
            'company' => 'ANowak',
            'roleID' => 2,
        ]);
    }
}
