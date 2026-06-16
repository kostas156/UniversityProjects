# University Administration & Grading System (UniSystem)

This project is a web-based **University Administration & Grading Information System** developed as part of the **Databases** course at the Department of Electrical and Computer Engineering (DUTH) by Group 8. The system manages academic workflows, student enrollments, course catalogs, and exam grading profiles via a robust **MySQL relational database** coupled with a dynamic **PHP/XHTML front-end**.

## 📝 Features & System Architecture

The application implements strict role-based access control (RBAC) separating administrative actions from student and faculty portals.

### 👥 User Roles & Portals
* **Administrative Interface (Secretariat):** * Add and enroll new students into university departments.
    * Manage and query structural tables using interactive, searchable grids powered by jQuery DataTables.
* **Professor Portal:** * Access distinct list views of assigned courses and teaching schedules.
    * Review enrolled student rosters per course.
    * Input, update, and commit official exam period grades directly into the database structure (`insert_db.php`).
* **Student Dashboard (`detailed_grades.php`):** * Personalized statistics tracking (Cumulative GPA, Total Earned ECTS credits, Passed vs. Total Registered Courses).
    * Historical transcript organization filtered dynamically by academic semesters and specific examination periods (`exam_period.php`).

### 🔒 Security & Session Management
* **Encrypted Authentication (`login.php` & `cookie_utils.php`):** Secures portal access by converting plain-text entry into robust cryptographic hashes using advanced `sodium_crypto_pwhash` protocols.
* **Secure Session Handshakes:** Implements protected cookie payloads encrypted with authenticated symmetric cryptography (`sodium_crypto_secretbox`) using automated cryptographic key and nonce generation.

## 🛠️ Relational Database Schema (MySQL)

The backend relational schema is built on top of multiple integrated tables enforcing rigorous cascading referential integrity constraints:
* `STUDENT`: Stores academic tracking, static profiles, structural hashes, calculated averages, and earned ECTS.
* `PROFESSOR`: Manages institutional identities, department mapping, and secure authorization targets.
* `SUBJECT`: Contains course identities, specialized streams (Directions), and standard ECTS weight configurations.
* `REGISTERS_FOR` & `EXAM_GRADES`: Resolves many-to-many relationship tracking between students, chosen courses, specified exam iterations, and active grading profiles.

## 📊 Directory Contents
* **Core Portal Pages:** `index.php`, `login.php`, `detailed_grades.php`, `exam_period.php`.
* **Admin Management Modules:** `admin_add_student.php`, `admin_student_table.php`, `insert_db.php`.
* **Utilities & Styles:** `cookie_utils.php` (Cryptographic handler), `connect.php` (MySQL Connection link), `base_css.php` (Global custom layout configurations).
* **`2223omada8-parts123.pdf`:** The complete engineering report containing Entity-Relationship (ER) diagrams, Relational Schema translations, normalization analysis, and standard SQL queries.

## 🛠️ Requirements & Installation

### Prerequisites
* Web Server stack (e.g., Apache with PHP 7.4+ or 8.x configured with the `libsodium` extension).
* MySQL Server instance (v5.7+ or v8.0+).

### Setup & Launch
1. Clone the folder and host it inside your local web server root directory (e.g., `htdocs` or `var/www/html`).
2. Import the SQL initialization dump provided in the main database folder into your running MySQL instance to build the relational tables.
3. Configure your local database credentials inside the `connect.php` configuration file:
   ```php
   $con = mysqli_connect("localhost", "your_username", "your_password", "database_name");