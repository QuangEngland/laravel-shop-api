<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 10 users with random data
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = fake()->name();
            $user->email = fake()->email();
            $user->password = Hash::make('password');
            $user->phone_number = fake()->phoneNumber();
            $user->membership_status = fake()->randomElement(['active', 'inactive']);
            $user->email_verified_at = now();
            if ($i == 0) {
                $user->assignRole('admin');
            } else {
                $user->assignRole('user');
            }
            $user->save();
        }
    }
}
