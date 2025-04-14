# login-funcional
 
 A secure login and registration system built with modern web technologies.

## System Preview
<img src="assets/images/login-register.png">

## ✨Features
* ✅ Complete authentication flow (register/login/dashboard/logout)

* 🔒 Password hashing using PHP's password_hash()

* 🛡️ Session management with security protections

* 📱 Responsive design that works on all devices

* 📝 Form validation (client-side + server-side)

* 🚦 Error handling with user-friendly messages

## ⚡ Quick Start
1. **Clone the repository**

* <code> git clone </code> https://github.com/MarceloDL29/login-funcional.git <br>

* <code>cd auth-system</code>

2. **Set up the database**

* Import database.sql to your MySQL server

* Configure includes/config.php with your credentials

3. **Launch the application** 

* Access login page at http://localhost/auth-system/index.html

* Register new users at http://localhost/auth-system/register.html

## 🏗️ Project Structure
<br>
/auth-system/<br>
├── public/                  # Frontend files <br>
│   ├── index.html           # Login page<br>
│   ├── register.html        # Registration page<br>
│   └── dashboard.php        # Protected page<br>
├── includes/                # Backend logic<br>
│   ├── config.php           # Database configuration<br>
│   ├── auth_functions.php   # Authentication logic<br>
│   └── session_manager.php  # Session handling<br>
└── assets/<br>
    ├── css/                 # Stylesheets<br>
    └── js/                  # Client-side scripts

## 🛠️ Dependencies
* PHP 7.4+

* MySQL 5.7+

* Modern web browser

## 🔧 Troubleshooting

* **Blank pages?** Check PHP error logs

* **Database issues?** Verify credentials in config.php

* **Session problems?** Ensure cookies are enabled

## 🤝 Contributing

### Pull requests are welcome! For major changes, please open an issue first.
