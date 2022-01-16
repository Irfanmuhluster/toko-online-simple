<?php

namespace Database\Seeders;

use App\Models\admin as ModelsAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $object = [
            [
                'name' => 'admin1',
                // 'username' => 'admin1',
                'email'  => 'admin1@admin.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        ModelsAdmin::insert($object);
    }
}
