<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'Carlos',
                'lastname' => 'Veizaga',
                'username' => 'Admin',
                'birthdate' => Carbon::now(),
                'ci' => '0123456987AD',
                'email' => 'admin@admin.com',
                'phone' => '+59144444444',
                'password' => bcrypt('admin'),
                'remember_token' => '',
            ],
            [
                'firstname' => 'Juan Carlos',
                'lastname' => 'Cabrera',
                'username' => 'juan',
                'birthdate' => Carbon::now(),
                'ci' => '0123456987AD',
                'email' => 'juancarlos@gmail.com',
                'phone' => '+59144444444',
                'password' => bcrypt('carlos'),
                'remember_token' => '',
            ],
            [
                'firstname' => 'Bart',
                'lastname' => 'Simpson',
                'username' => 'bartsimpson',
                'birthdate' => Carbon::now(),
                'ci' => '0123456987AD',
                'email' => 'bart@gmail.com',
                'phone' => '+59144444444',
                'password' => bcrypt('bartsimpson'),
                'remember_token' => '',
            ],
            [
                'firstname' => 'Homero',
                'lastname' => 'Simpson',
                'username' => 'homerosimpson',
                'birthdate' => Carbon::now(),
                'ci' => 'AV454545454',
                'email' => 'HOMERO@gmail.com',
                'phone' => '+591123456789',
                'password' => bcrypt('homerosimpson'),
                'remember_token' => '',
            ],
            [
                'firstname' => 'Otto',
                'lastname' => 'Mann',
                'username' => 'otto',
                'birthdate' => Carbon::now(),
                'ci' => '0123456987AD',
                'email' => 'otto@gmail.com',
                'phone' => '+59195159525',
                'password' => bcrypt('ottomann'),
                'remember_token' => '',
            ],
            [
                'firstname' => 'Seymour',
                'lastname' => 'Skinner',
                'username' => 'seymour',
                'birthdate' => Carbon::now(),
                'ci' => 'OKK45462582',
                'email' => 'seymour@gmail.com',
                'phone' => '+59113456798',
                'password' => bcrypt('Seymour'),
                'remember_token' => '',
            ],
        ];

        Permission::create([ 'name' => 'backend access' ]);
        
        foreach ($users as $item) {
            $user = User::create($item);

            $user->givePermissionTo('backend access');

            if ($user->username == 'Admin') {
                $user->assignRole(['admin']);
            } elseif ($user->username == 'juan') {
                $user->assignRole(['redactor']);
            }elseif ($user->username == 'seymour') {
                $user->assignRole(['editor']);
            } else {
                $user->assignRole(['writer']);
            }

        }
    }
}
