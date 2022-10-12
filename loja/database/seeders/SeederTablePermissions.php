<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['role-list',
                        'role-edit',
                        'role-delete',
                        'role-create',
                        'user-list',
                        'user-edit',
                        'user-delete',
                        'user-create',
                        'vendedores-list',
                        'vendedores-edit',
                        'vendedores-delete',
                        'vendedores-create',
                        'clientes-list',
                        'clientes-edit',
                        'clientes-delete',
                        'clientes-create',];

        foreach($permissions as $permission){
            Permission::create(['name'=> $permission]);
        }
    }
}
