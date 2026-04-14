# Payroll System Architecture & Implementation Plan

## 1. Roles & Permissions (Access Control)
The system supports 5 distinct roles managed via a `Role` Enum:
1. **Admin**: System configuration, user management, and fallback data entry.
2. **Kế toán lương (Payroll Accountant)**: 
   - Generates Excel templates for timesheets.
   - Uploads completed timesheets.
   - Executes payroll calculation.
   - Manages manual adjustments (bonuses/deductions with reasons).
   - Submits payroll for approval.
   - Finalizes/Archives payroll after payout.
3. **Kế toán trưởng (Chief Accountant)**: Reviews and approves (Level 1) or rejects payroll back to Payroll Accountant.
4. **Quản lý (Manager)**: Reviews and approves (Level 2) or rejects payroll back to Chief Accountant.
5. **Người lao động (Employee)**: Self-service access to view their own payslips *only* after the payroll is in the `Archived` state.

## 2. Core Entities & Database Schema
- **User**: Core authentication, linked to `Role` Enum.
- **SalaryConfig / Contract**: Base salary, fixed allowances, tax/insurance rates for employees.
- **Timesheet**: Monthly attendance data (working days, leaves, overtime) imported via Excel.
- **Payroll (Kỳ Lương)**: Represents a monthly payroll run.
- **Payslip (Phiếu Lương)**: Individual employee salary details linked to a `Payroll`.
- **PayslipItem**: Line items for base pay, additions, and deductions (including manual adjustments with reasons).

## 3. Payroll State Machine (Workflow)
The `Payroll` model follows a strict state machine:
1. **Draft**: Initial state. Payroll Accountant can recalculate or add manual adjustments.
2. **Pending_Chief_Accountant**: Awaiting Level 1 approval.
   - Approve -> Move to Pending_Manager
   - Reject (with reason) -> Move back to Draft
3. **Pending_Manager**: Awaiting Level 2 approval.
   - Approve -> Move to Processing
   - Reject (with reason) -> Move back to Pending_Chief_Accountant
4. **Processing**: Approved. Finance team processes actual bank payouts.
5. **Archived**: Finalized. Employees can now view their payslips.

## 4. Email Notifications (Event-Driven)
Laravel Mail/Queues will notify users of state changes:
- To Chief Accountant: Payroll awaits approval.
- To Manager: Chief Accountant approved, awaits your approval.
- To Submitter: Payroll rejected (includes reason).
- To Employee: New payslip is available (when state becomes Archived).

## 5. Technical Requirements
- **Stack**: PHP 8.5+, Laravel 13.x, Livewire 3.
- **Standards**: Strict typing, Enums for states/roles, Constructor Property Promotion.
- **Excel Handling**: `maatwebsite/excel` (or similar) for exporting templates and importing timesheets.
- **PDF Generation**: `barryvdh/laravel-dompdf` for payslip downloads.
- **Testing**: Pest PHP for unit testing calculation logic and state transitions.

## Next Steps
1. Scaffold Laravel project (if not exists) and configure database.
2. Implement Migrations, Models, and Enums based on the schema above.
3. Implement Excel Export/Import functionality for Timesheets.
4. Build the core `CalculateMonthlyPayrollAction` and manual adjustment UI.
5. Implement the Approval State Machine and Email Notification listeners.
6. Build Employee Self-Service views.
