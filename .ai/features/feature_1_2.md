# Feature 1.2: User Auth, Roles & Permissions

**Assignee**: @Coder
**Reviewer**: @Reviewer

## Objective
Establish a robust Role-Based Access Control (RBAC) system using the `spatie/laravel-permission` package. Restructure the User model to support many-to-many roles and detailed permissions.

| Index | Task Name | Goal / Definition of Done | Status |
| :---: | :--- | :--- | :---: |
| 1.2.1 | Install Spatie Package | `spatie/laravel-permission` installed, migrations run. | [Done] |
| 1.2.2 | Update User Model | Add `HasRoles` trait to User model. | [Done] |
| 1.2.3 | Seed Roles & Permissions | Seeder created with 5 base Roles and core Permissions. | [Done] |
| 1.2.4 | Seed Test Users | 5 test users created and assigned to their respective Roles. | [Done] |
| 1.2.5 | Test Permissions | Pest tests written to verify role assignments and core permission checks. | [Done] |
