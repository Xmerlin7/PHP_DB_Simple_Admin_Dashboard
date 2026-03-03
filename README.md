Students Admin — Simple PHP CRUD

Overview

- Minimal, single-folder PHP app for managing `students` (id, name, email, age).
- Uses PDO + prepared statements to avoid SQL injection.
- Clean separation of concerns via small files (no folders):
  - `db.php` — PDO connection
  - `User.php` — simple OOP model
  - `header.php` / `footer.php` — layout + Bootstrap
  - `dashboard.php`, `create.php`, `edit.php` — pages included by `test.php`
  - `test.php` — single entrypoint router

Quick start (local)

```bash
cd /home/....
php -S localhost:8000
# Then open http://localhost:8000/test.php?action=dashboard
```

Notes & design choices

- Buttons: `Update` uses Bootstrap `btn-primary`, `Delete` uses `btn-danger`.
- Cards are consistent across the grid (no alternating backgrounds).
- Session is used only for flash messages.
- Keep it simple: no frameworks, no folders, easy to read and modify.

Security & improvements

- This demo intentionally omits CSRF protection and server-side validation to keep the code minimal for learning purposes.
- Avoid using the vulnerable demo in production — it is for educational use only.

