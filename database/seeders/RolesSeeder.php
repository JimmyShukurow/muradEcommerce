<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    const ROLES = [
        [
            'name' => 'user',
        ],
        [
            'name' => 'admin',
        ]
    ];

  
    public function run()
    {
        foreach (self::ROLES as $role) {
            if(!Role::where('name', $role['name'])->first()) {
                Role::create($role);
            }
        }
    }
}