<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = ModelsUser::create([
            'name' => 'Admin 1',
            // 'username' => 'customer1',
            'email'  => 'admin1@admin.com',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin->assignRole('admin');


        $user = ModelsUser::create([
            'name' => 'Customer 1',
            // 'username' => 'customer1',
            'email'  => 'customer1@customer.com',
            'password' => Hash::make('customer123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('user');
    }
}
