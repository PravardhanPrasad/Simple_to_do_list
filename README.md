# Simple To‑Do List

A minimalist PHP-powered **To‑Do List** web app to help you manage daily tasks with ease and simplicity.

---

## 🚀 Features

- Create, display, and delete tasks using plain PHP and MySQL/SQLite (depending on setup).
- SQL-based persistence with `todo.sql` containing the database schema.

---

## 📂 Repository Structure

```
Simple_to_do_list/
├── index.php      # Main front-end and request handler
├── todo.sql       # SQL schema to create tasks table
└── README.md      # Project documentation (this file)
```

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/PravardhanPrasad/Simple_to_do_list.git
cd Simple_to_do_list
```

### 2. Prepare Your Database
- Import `todo.sql` into your database server (MySQL, MariaDB, or SQLite):
```sql
-- For MySQL or MariaDB:
CREATE DATABASE todo_app;
USE todo_app;
SOURCE todo.sql;
```

- Alternatively, use SQLite (update `index.php` accordingly).

### 3. Configure Database Connection
Open `index.php` and modify the database connection settings (hostname, username, password, database name).  

Example configuration setup in `index.php`:

```php
<?php
$pdo = new PDO('mysql:host=localhost;dbname=todo_app;charset=utf8mb4', 'your_user', 'your_pass');
// OR for SQLite:
// $pdo = new PDO('sqlite:todo.sqlite3');
```

### 4. Deploy to Server
Ensure your PHP server can write to the database.  
Run the app with a built-in PHP server:
```bash
php -S localhost:8000
```
Access it in your browser at: `http://localhost:8000`

---

## 📝 Usage

- **Add a Task**: Fill in the input field and submit the form.
- **Delete a Task**: Click the "Delete" button next to a task to remove it.

---

## 🖼️ Screenshots

![image](https://github.com/user-attachments/assets/f8809eee-c85b-4a8d-9f93-5cfaebd4c17f)

---

## 🛠️ Built With

- **PHP** – Server-side logic  
- **MySQL / SQLite** – Task storage backend  
- **PDO** – Secure, database-agnostic connection method

---

## 🤝 Contributing

Improvements welcome! You can consider:
- Adding update/edit functionality.
- Incorporating task completion toggles.
- Enhancing security (e.g., CSRF protection, input sanitization).
- Styling the UI with CSS frameworks like Bootstrap.

To contribute, simply fork the repo, make your enhancements, and open a pull request.

---
