# BitBalance – AI-Assisted Calorie Tracking Platform

BitBalance is a modular full-stack web application designed to help users track daily calorie intake, manage nutrition goals, and monitor progress over time.

The system integrates AI-powered food image analysis via Gemini API and includes multi-role access control (User/Admin), forum interaction, and product management features.

⚠️ To enable AI functionality, create include/secrets.php and add your Gemini API key.

## 🎯 Project Motivation

This system was developed to explore AI-assisted health tracking and demonstrate secure full-stack PHP development using modular architecture.

## 🧠 Technical Highlights

- Secure password hashing (password_hash, password_verify)
- Modular backend structure
- Gemini AI API integration with server-side processing
- Dynamic chart rendering using JavaScript
- Secure PDO prepared statements

---

# 🚀 System Overview

BitBalance is structured into modular backend components to separate concerns and maintain scalability:
	•	Authentication Module – Session-based login with password hashing
	•	Calorie Tracking Module – Intake logging and daily goal management
	•	AI Integration Module – Image processing and calorie extraction
	•	Admin Module – User, system log and content management (Work in progress)

Database communication is handled using PDO with prepared statements to prevent SQL injection.

# 🏗 Architecture Design

The system follows a modular MVC-inspired structure:
- Controllers handle request routing and business logic
- Models manage database interactions via PDO
- Views are rendered using PHP templates

---

## 🗄 Database Overview

BitBalance uses a relational MySQL database designed with data integrity, scalability, and modularity in mind.  

The schema enforces structured relationships through foreign key constraints and follows a normalized design to reduce redundancy.

### 🔑 Core Entities

- **user** – Stores account credentials, role (regular/admin), and profile information  
- **userStatus** – Tracks account state, login attempts, and activity streaks  
- **userGoal** – Stores daily calorie goals  
- **intakeLog** – Records food intake entries and calorie values  
- **weight_log** – Tracks user weight progress over time

### 🔐 Security & Audit Tables

- **login_attempts** – Tracks login activity and IP addresses  
- **password_resets** – Secure token-based password recovery  
- **activity_log** – Logs user actions for auditing  
- **site_fees** – Configurable system fees  

### 📊 Design Considerations

- Foreign key constraints with cascading rules ensure referential integrity  
- Unique constraints (e.g., user email) prevent duplication  
- ENUM fields are used for controlled status values  
- Indexed columns improve performance for frequent queries (login attempts, orders, forum interactions)  

The database supports modular expansion and aligns with the application's multi-role architecture.


# 🔐 Security Considerations
	•	Password hashing for user authentication
	•	Session-based access control
	•	PDO prepared statements to prevent SQL injection
	•	Basic input validation and sanitization
    •	Server-side validation for all critical form inputs
    •	Role-based access verification on protected routes
    •	Prevention of direct URL access to admin-only pages

# ✨ Features
	•	User registration and login
	•	AI-assisted calorie estimation from food images
	•	Calorie intake logging with 7-day progress chart
	•	Set and update daily calorie goals
	•	CRUD operations for intake records
	•	Forum with posts, comments, and likes
	•	Product listing with basket functionality
	•	Admin dashboard for user and content management
	•	Responsive UI


## Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP (PDO for MySQL)
- **Database:** MySQL
- **Tools:** XAMPP (for local development)
- **Version control:** Git, GitHub

## Setup & Installation

1. **Clone this repo**
    ```bash
    git clone https://github.com/rmit-computing-technologies/prototype-milestone-2-group_20_wps_2025.git
    ```

2. **Import the Database**
    - Use `phpMyAdmin` or the MySQL CLI to import the provided SQL files from `include/` (if available).
    - Make sure your MySQL user and password are set in `db_config.php`.

3. **Configure Environment**
    - Edit `db_config.php` with your local database credentials.
	- For Gemini AI in Dashboard Intake Usage, use your own API Key and create `include/secrets.php` with content as follows:
	    
	```bash
	<?php
	// Gemini API key (this should be kept secret in a real application, but is included here for demonstration purposes)
	// Should be put in .env file in production
	define('GEMINI_API_KEY', 'EXAMPLE_API_KEY');
	?>
    ```

4. **Run Locally**
    - Place the project in your local web server’s directory (e.g. `htdocs` for XAMPP).
    - Visit `http://localhost/BitBalance-2.0---Calorie-Tracker/` in your browser.
    - Visit `http://localhost/BitBalance-2.0---Calorie-Tracker/admin/admin.php` (for admin pages)

---

## Test Account


You can create your own account, the sign-up and sign-in processes are fully functional, and your password is securely hashed.

Easy Admin:
admin@gmail.com
admin123

## Usage

- **Sign Up** for an account or log in (User). 
- **Admin Sign Up**, visit `http://localhost/BitBalance-2.0---Calorie-Tracker/admin/admin-signup.php` (For demo purposes only)
- **Set your daily calorie goal** via the Dashboard.
- **Add food intake** on the Intake page.
- **View your weekly progress** with dynamic charts.
- **Admins** can access admin tools via `/admin/admin.php`.

## License

This project is for educational purposes.  
MIT License.

## Screenshots

![Homepage Screenshot](screenshots/index.png)
**BitBalance Homepage**

![Dashboard Screenshot](screenshots/dashboard.png)
**BitBalance Dashboard**

![Dashboard Intakte Screenshot](screenshots/dashboard-intake.png)
**BitBalance Dashboard Intake**

![Dashboard Calculator Screenshot](screenshots/dashboard-calculator.png)
**BitBalance Dashboard Calculator**

---

## Contact

For any issues or questions, open a GitHub issue or contact [s3974781@rmit.edu.vn].