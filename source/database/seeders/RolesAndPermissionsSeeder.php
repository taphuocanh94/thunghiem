<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'view departments', 'create departments', 'edit departments', 'delete departments',
            'view positions', 'create positions', 'edit positions', 'delete positions',
            'view employees', 'create employees', 'edit employees', 'delete employees',
            'view salary config', 'create salary config', 'edit salary config', 'delete salary config',
            'export timesheet template', 'import timesheet', 'view timesheet',
            'process payroll', 'view draft payroll', 'edit draft payroll',
            'approve payroll level 1', 'approve payroll level 2', 'reject payroll',
            'view own payslips', 'export own payslip'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions

        // Employee
        $role = Role::create(['name' => 'Employee'])
            ->givePermissionTo(['view own payslips', 'export own payslip']);

        // Admin / HR
        $role = Role::create(['name' => 'Admin'])
            ->givePermissionTo([
                'view departments', 'create departments', 'edit departments', 'delete departments',
                'view positions', 'create positions', 'edit positions', 'delete positions',
                'view employees', 'create employees', 'edit employees', 'delete employees',
                'view salary config', 'create salary config', 'edit salary config', 'delete salary config',
            ]);

        // Payroll Accountant
        $role = Role::create(['name' => 'Payroll Accountant'])
            ->givePermissionTo([
                'export timesheet template', 'import timesheet', 'view timesheet',
                'process payroll', 'view draft payroll', 'edit draft payroll'
            ]);

        // Chief Accountant
        $role = Role::create(['name' => 'Chief Accountant'])
            ->givePermissionTo(['approve payroll level 1', 'reject payroll']);

        // Manager
        $role = Role::create(['name' => 'Manager'])
            ->givePermissionTo(['approve payroll level 2', 'reject payroll']);
    }
}