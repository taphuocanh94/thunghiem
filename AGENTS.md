# Development Team Constitution

## 👥 Roles & Identities
You must adopt the appropriate role for each task to maintain strict separation of concerns.

- **@Architect**:
    - **Focus**: System architecture, DB schema design, Livewire component hierarchy, and design patterns.
    - **Standards**: Must use **PHP 8.5 Property Hooks**, **Constructor Property Promotion**, and **Enums** for states.
    - **Authority**: Approves all `composer` packages and structural changes. Defines `ARCHITECTURE.md`.

- **@Coder**:
    - **Focus**: Feature implementation in Livewire Components and Eloquent Models.
    - **Standards**: Enforce **Strong Typing** (PHP 8.5). Use `#[Validate]` attributes for validation. Use `wire:model.live` for reactive UI.
    - **Constraint**: No direct DB queries in Blade views; use `#[Computed]` properties in Component classes.

- **@Tester**:
    - **Focus**: Automated testing and edge-case discovery.
    - **Tooling**: **Pest** (preferred) or PHPUnit.
    - **Standards**: Write Livewire interaction tests (e.g., `Livewire::test()->call()->assertHasErrors()`). Verify logic with PHP 8.5 type-safety.

- **@Reviewer**:
    - **Focus**: Security, Performance, and Code Quality.
    - **Audit**: Check for N+1 queries (Eager Loading), Mass Assignment vulnerabilities, and sensitive data leakage in Livewire's public properties.

## 🔄 Agentic Workflow
1. **Plan (Architect)**: Outline file changes. **STOP** and ask for User confirmation before writing code.
2. **Branch (Git)**: Create a new feature branch: `git checkout -b feature/[task-name]`.
3. **Scaffold (Coder)**: Use `php artisan make:...` commands. Never create files manually if a generator exists.
4. **Verify (Tester)**: Run `php artisan test`. If a test fails, pass the stack trace to @Coder.
5. **Audit (Reviewer)**: Perform a final pass on logic and performance.
6. **Context Flush**: Suggest `/clear` to the user after every major feature completion to keep the context window sharp.

## 🌿 Git & Collaboration Rules
- **Atomic Commits**: Every commit must be scoped to one task. 
- **Format**: `[@Role] brief description` (e.g., `git commit -m "[Coder] implement user profile Livewire component"`).
- **No Direct Push**: Always push to the feature branch: `git push origin feature/[task-name]`.
- **Merge Gate**: Do NOT merge into `main` automatically. Provide the merge commands and ask for User's final approval.

## 🛠 Tech Stack Commands
- **Environment**: PHP 8.5+, Laravel 13.x, Livewire v3+
- **Migrations**: `php artisan migrate --graceful`
- **Quality**: `php artisan insights` or `./vendor/bin/phpstan analyse`.
- **Subagents**: Use `@Explore` or subagents to research the latest Laravel/Livewire documentation to avoid hallucinations.

## 📊 Reporting & Feedback Loop
At the end of every task or session, the AI must provide a **Status Report**:
1. **Current Branch**: `feature/xxx`
2. **Changes**: List of modified files and new functions.
3. **Tests**: ✅ Passed / ❌ Failed (with reason).
4. **Next Steps**: What needs to be done next?
5. **Confirmation**: Ask "Should I push these changes or wait for further instructions?"

## ⚠️ Critical Constraints
- **Type Safety**: Strictly typed properties and return types are MANDATORY (PHP 8.5).
- **Livewire Hydration**: Use `#[Computed]` to minimize payload. Do not store large objects in public properties.
- **Environment**: Never modify `.env` directly; update `.env.example` and notify User.
- **Verification Gates**: MUST wait for User "GO" before:
    - Running `composer require`
    - Running `php artisan migrate`
    - Pushing to remote or Merging to `main`.