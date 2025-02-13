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
      
      Permission::create(['name' => 'usuarios.index'])->syncRoles([$admin, $gerencia]);
      Permission::create(['name' => 'usuarios.create'])->syncRoles([$admin, $gerencia]);
      Permission::create(['name' => 'usuarios.store'])->syncRoles([$admin, $gerencia]);

      Permission::create(['name' => 'personal_policial.index'])->syncRoles([$admin, $gerencia, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'personal_policial.create'])->syncRoles([$admin,$gerencia, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'personal_policial.store'])->syncRoles([$admin, $gerencia, $tecnico1, $tecnico2]);
      
      Permission::create(['name' => 'dependencia.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'dependencia.create'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'dependencia.store'])->syncRoles([$admin, $tecnico1, $tecnico2]);

      Permission::create(['name' => 'flota-vehicular.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'flota-vehicular.create'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'flota-vehicular.store'])->syncRoles([$admin, $tecnico1, $tecnico2]);

      Permission::create(['name' => 'ver_reclamos.index'])->syncRoles([$admin, $gerencia]);
      Permission::create(['name' => 'reclamos.descargar'])->syncRoles([$admin, $gerencia]);

      Permission::create(['name' => 'asignacion.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'asignar-vehiculo.create'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'asignar-vehiculo.store'])->syncRoles([$admin, $tecnico1, $tecnico2]);

      Permission::create(['name' => 'vincular_personal.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'vincular_personal.create'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'vincular_personal.store'])->syncRoles([$admin, $tecnico1, $tecnico2]);

      Permission::create(['name' => 'solicitud.index'])->syncRoles([$policia]);
      Permission::create(['name' => 'solicitud.create'])->syncRoles([$policia]);
      Permission::create(['name' => 'solicitud.store'])->syncRoles([$policia]);
      Permission::create(['name' => 'gestionar.solicitud'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'solicitudes.confirmar'])->syncRoles([$admin, $tecnico1, $tecnico2]);

      Permission::create(['name' => 'mantenimiento.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'mantenimientos.registro'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'mantenimientos.guardar'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'mantenimientos.eliminar'])->syncRoles([$admin, $tecnico1, $tecnico2]);


      Permission::create(['name' => 'ordenes.index'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'ordenes.generar'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'ordenes.finalizar'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'ordenes.pdf'])->syncRoles([$admin, $tecnico1, $tecnico2]);
      Permission::create(['name' => 'ordenes.imprimir'])->syncRoles([$admin, $tecnico1, $tecnico2]);


      
    }
}
