<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;

class RolesAndPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Seed the database with roles and permissions
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_admin_can_manage_departments()
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $this->assertTrue($admin->hasPermissionTo('create departments'));
        $this->assertTrue($admin->hasPermissionTo('delete departments'));
    }

    public function test_employee_cannot_manage_departments()
    {
        $employee = User::factory()->create();
        $employee->assignRole('Employee');

        $this->assertFalse($employee->hasPermissionTo('create departments'));
    }

    public function test_payroll_accountant_has_correct_permissions()
    {
        $payrollAccountant = User::factory()->create();
        $payrollAccountant->assignRole('Payroll Accountant');
        
        $this->assertTrue($payrollAccountant->hasPermissionTo('process payroll'));
        $this->assertFalse($payrollAccountant->hasPermissionTo('approve payroll level 1'));
    }
}
