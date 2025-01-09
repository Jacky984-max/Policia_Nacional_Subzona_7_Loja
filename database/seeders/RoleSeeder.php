<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         /** Admin, Gerencia, Técnico 1, Técnico 2, Personal Policial*/

      $admin = Role::create(['name' => 'admin']);
      $gerencia = Role::create(['name' => 'gerencia']);
      $tecnico1 = Role::create(['name' => 'tecnico1']);
      $tecnico2 = Role::create(['name' => 'tecnico2']);
      $policia = Role::create(['name' => 'policia']);

      Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $gerencia, $tecnico1, $tecnico2, $policia]);
      

      
    }
}
