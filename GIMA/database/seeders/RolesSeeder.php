<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar caché de permisos para evitar errores
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Crear los 4 Roles base
        // Usamos 'guard_name' => 'web' por defecto en Laravel, Sanctum lo usa internamente.
        $adminRole = Role::create(['name' => 'admin']);
        $supervisorRole = Role::create(['name' => 'supervisor']);
        $tecnicoRole = Role::create(['name' => 'tecnico']);
        $reporterRole = Role::create(['name' => 'reporter']);   //Usuario que reporta fallas

        // 2. Crear usuarios base para pruebas

        //Ususario Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'), 
        ]);
        $admin->assignRole($adminRole);

        // --- USUARIO SUPERVISOR ---
        $supervisor = User::create([
            'name' => 'Roberto Supervisor',
            'email' => 'supervisor@test.com',
            'password' => Hash::make('12345678'),
        ]);
        $supervisor->assignRole($supervisorRole);

        // --- USUARIO TÉCNICO ---
        $tecnico = User::create([
            'name' => 'Juan Técnico',
            'email' => 'tecnico@test.com',
            'password' => Hash::make('12345678'),
        ]);
        $tecnico->assignRole($tecnicoRole);

        // --- USUARIO REPORTER ---
        $reporter = User::create([
            'name' => 'Ana Reportes',
            'email' => 'reporter@test.com',
            'password' => Hash::make('12345678'),
        ]);
        $reporter->assignRole($reporterRole);

        //3. Permisos

        //=====================================
        // ======= PERMISOS COMPARTIDOS ======
        // Capacidad de enviar un reporte de falla.
        $permissionCrearReporteFallas = Permission::create(['name' => 'crear reporte fallas']);
        // Ver solo los reportes creados por el propio usuario.
        $permissionVerMisReportes = Permission::create(['name' => 'ver mis reportes']);
        // Acceso de solo lectura al listado de activos.
        $permissionVerCatalogoActivos = Permission::create(['name' => 'ver catalogo activos']);
        
        //=====================================
        // ======= PERMISOS ADMIN ======
        //CRUD completa de usuarios
        $permissionGestionarUsuarios = Permission::create(['name' => 'gestionar usuarios']);
        // CRUD Ubicaciones, Repuestos, Proveedores
        $permissionGestionMaestra = Permission::create(['name' => 'gestion maestra']);

        //=====================================
        // ======= PERMISOS SUPERVISOR ======
        // Acceso a la vista principal de la gestión
        $permissionVerSupervisorDashboard = Permission::create(['name' => 'ver dashboard supervisor ']);
        // Crear, modificar y listar activos.
        $permissionGestionarActivos = Permission::create(['name' => 'gestionar activos']);
        // Asignar reportes de fallas a técnicos.
        $permissionAsignarReportes = Permission::create(['name' => 'gestionar reportes']);
        // Crear y modificar planes de mantenimiento.
        $permissionGestionarMantenimientos = Permission::create(['name' => 'gestionar mantenimientos']);

        //=====================================
        // ======= PERMISOS TECNICO ======
        // Ver las tareas asignadas.
        $permissionVerMisTareas = Permission::create(['name' => 'ver mis tareas']);
        // Registrar el inicio, avance y finalización de tareas.
        $permissionRegistrarActividadTecnica = Permission::create(['name' => 'registrar actividad tecnica']);
        // Usar y eliminar repuestos del inventario.
        $permissionRegistrarRepuestosUsados = Permission::create(['name' => 'registrar repuestos usados']);

        //==========Asignacion de Permisos===============

        //====== Admin =============
        $adminRole->givePermissionTo(Permission::all());

        //====== Supervisor ==============
        $supervisorRole->givePermissionTo([
            $permissionVerSupervisorDashboard,
            $permissionGestionarActivos,
            $permissionAsignarReportes,
            $permissionGestionarMantenimientos,
            $permissionCrearReporteFallas,
            $permissionVerCatalogoActivos,
            $permissionVerMisReportes
        ]);

        //====== Tecnico ==============
        $tecnicoRole->givePermissionTo([
            $permissionVerMisTareas,
            $permissionRegistrarActividadTecnica,
            $permissionRegistrarRepuestosUsados,
            $permissionCrearReporteFallas,
            $permissionVerCatalogoActivos,
            $permissionVerMisReportes
        ]);

        //======Usuario Final==========
        $reporterRole->givePermissionTo([
            $permissionCrearReporteFallas,
            $permissionVerMisReportes,
            $permissionVerCatalogoActivos
        ]);


    }
}
