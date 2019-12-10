<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'writer',
            ],
            [
                'name' => 'redactor',
            ],
            [
                'name' => 'editor',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
