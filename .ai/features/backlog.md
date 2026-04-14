# Product Backlog: Payroll System

This document outlines the high-level epics and features planned for the MVP of the Payroll System.

| Index | Feature Name | Goal / Definition of Done | Status |
| :---: | :--- | :--- | :---: |
| **1.1** | Initialize Laravel & Livewire | Base Laravel app with Livewire and SQLite is ready and tested. Detailed in `init_project.md` | [Done] |
| **1.2** | User Auth, Roles & Permissions | Implement `spatie/laravel-permission` for roles and access control. | [Done] |
| **1.3** | Base Layouts & Navigation | UI layouts configured with conditional navigation based on User Role. | [Pending] |
| **2.1** | Departments, Positions & Employee Directory | Admin/HR can CRUD Departments, Positions, User profiles, and assign Managers. | [Pending] |
| **2.2** | Salary Configuration | Admin/HR can CRUD `SalaryConfig` (base pay, allowances, tax) per employee. | [Pending] |
| **3.1** | Export Timesheet Template | Payroll Accountant can download an Excel template containing employees for a given month. | [Pending] |
| **3.2** | Import Timesheet | Payroll Accountant can upload a filled Timesheet Excel file. | [Pending] |
| **3.3** | View Timesheet Data | UI displays imported timesheet data for review before payroll processing. | [Pending] |
| **4.1** | Core Payroll Engine | System calculates gross/net pay and generates `Payroll` and `Payslip` records. | [Pending] |
| **4.2** | Manual Adjustments | UI to add additions/deductions with required reasons to draft payslips. | [Pending] |
| **4.3** | Payroll Preview | Payroll Accountant can review all draft payslips in a pay period. | [Pending] |
| **5.1** | Approval State Machine | `Payroll` model transitions through Draft -> Pending Chief -> Pending Manager -> Processing -> Archived. | [Pending] |
| **5.2** | Chief Accountant Dashboard | UI for Level 1 approval. | [Pending] |
| **5.3** | Manager Dashboard | UI for Level 2 approval. | [Pending] |
| **5.4** | Rejection Workflow | Approvers can reject a payroll back to the previous state with a mandatory reason. | [Pending] |
| **5.5** | Email Notifications | System dispatches emails on state changes (Approval requests, rejections, finalized). | [Pending] |
| **6.1** | Employee Dashboard | Employees can see a list of their archived payslips. | [Pending] |
| **6.2** | Detailed Payslip View | Employees can view the breakdown of a specific payslip. | [Pending] |
| **6.3** | Export PDF Payslip | Employees can download their payslip as a PDF. | [Pending] |
