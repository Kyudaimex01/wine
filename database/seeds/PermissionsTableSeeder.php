<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [ 'name' => 'list users' ],
            [ 'name' => 'create users' ],
            [ 'name' => 'edit users' ],
            [ 'name' => 'delete users' ],

            [ 'name' => 'list roles' ],
            [ 'name' => 'create roles' ],
            [ 'name' => 'edit roles' ],
            [ 'name' => 'delete roles' ],

            [ 'name' => 'list writers' ],
            [ 'name' => 'create writers' ],
            [ 'name' => 'edit writers' ],
            [ 'name' => 'delete writers' ],

            [ 'name' => 'list redactors' ],
            [ 'name' => 'create redactors' ],
            [ 'name' => 'edit redactors' ],
            [ 'name' => 'delete redactors' ],

            [ 'name' => 'list suscriptors' ],
            [ 'name' => 'create suscriptors' ],
            [ 'name' => 'edit suscriptors' ],
            [ 'name' => 'delete suscriptors' ],

            [ 'name' => 'list areas' ],
            [ 'name' => 'create areas' ],
            [ 'name' => 'edit areas' ],
            [ 'name' => 'delete areas' ],

            [ 'name' => 'list letters' ],
            [ 'name' => 'create letters' ],
            [ 'name' => 'show letters' ],
            [ 'name' => 'edit letters' ],
            [ 'name' => 'delete letters' ],

            [ 'name' => 'list articles' ],
            [ 'name' => 'create articles' ],
            [ 'name' => 'show articles' ],
            [ 'name' => 'edit articles' ],
            [ 'name' => 'delete articles' ],

            [ 'name' => 'list templates' ],
            [ 'name' => 'create templates' ],
            [ 'name' => 'show templates' ],
            [ 'name' => 'edit templates' ],
            [ 'name' => 'delete templates' ],

            [ 'name' => 'list bulletins' ],
            [ 'name' => 'create bulletins' ],
            [ 'name' => 'show bulletins' ],
            [ 'name' => 'edit bulletins' ],
            [ 'name' => 'publish bulletins' ],
            [ 'name' => 'delete bulletins' ],

            [ 'name' => 'train machine' ],
        ];

        
        $admin = Role::find(1);
        //$writer = Role::where('name', 'writer')->first();
        $writer = Role::find(2);
        $redactor = Role::find(3);
        $editor = Role::find(4);
        
        
        foreach ($permissions as $permission) {
            Permission::create($permission);
            $admin->givePermissionTo($permission);
        }

        $writer->givePermissionTo('list letters');
        $writer->givePermissionTo('create letters');
        $writer->givePermissionTo('edit letters');
        $writer->givePermissionTo('show letters');
        $writer->givePermissionTo('delete letters');

        $redactor->givePermissionTo('list letters');
        $redactor->givePermissionTo('show letters');
        $redactor->givePermissionTo('list areas');
        $redactor->givePermissionTo('create areas');
        $redactor->givePermissionTo('edit areas');
        $redactor->givePermissionTo('train machine');
        $redactor->givePermissionTo('list articles');
        $redactor->givePermissionTo('show articles');
        $redactor->givePermissionTo('create articles');
        $redactor->givePermissionTo('edit articles');
        $redactor->givePermissionTo('delete articles');

        $editor->givePermissionTo('list articles');
        $editor->givePermissionTo('show articles');
        $editor->givePermissionTo('list bulletins');
        $editor->givePermissionTo('show bulletins');
        $editor->givePermissionTo('create bulletins');
        $editor->givePermissionTo('edit bulletins');
        $editor->givePermissionTo('publish bulletins');
        $editor->givePermissionTo('list templates');
        $editor->givePermissionTo('show templates');
    }
}
