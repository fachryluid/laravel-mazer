<?php

namespace Database\Seeders;

use App\Constants\UserGender;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'gender' => UserGender::MALE,
                'birthday' => '2002-10-08',
                'phone' => '0812-3456-7891',
                'password' => Hash::make('manager')
            ]
        ];

        foreach ($users as $user) {
            $adminExists = User::where('username', $user['username'])->exists();

            if (!$adminExists) {
                $user = User::create($user);

                Manager::create([
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
