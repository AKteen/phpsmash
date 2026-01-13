# LoginSystem

A simple PHP-based login and registration system with session management.

## Features

- User Registration with validation
- User Login with authentication
- Session-based route protection
- Secure logout functionality
- Responsive Bootstrap UI
- MySQL database integration

## Requirements

- XAMPP (Apache + MySQL + PHP)
- Web browser

## Setup

1. Clone this repository to your XAMPP htdocs folder:
   ```
   git clone <your-repo-url> C:\xampp\htdocs\LoginSystem
   ```

2. Start XAMPP and enable Apache and MySQL services

3. Create a MySQL database and update `partials/dbconnect.php` with your database credentials

4. Access the application at `http://localhost/LoginSystem`

## File Structure

```
LoginSystem/
├── partials/
│   ├── navbar.php      # Navigation bar component
│   └── dbconnect.php   # Database connection
├── login.php           # Login page
├── signup.php          # Registration page
├── welcome.php         # Protected home page
├── logout.php          # Logout page
└── README.md
```

## Usage

1. **Register**: Create a new account on the signup page
2. **Login**: Use your credentials to access the system
3. **Welcome**: Protected page accessible only after login
4. **Logout**: Safely end your session

## Database Schema

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Security Features

- Session-based authentication
- Duplicate user prevention
- Password confirmation validation
- Protected routes

## Technologies Used

- PHP
- MySQL
- Bootstrap 5
- HTML/CSS
- JavaScript