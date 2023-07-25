# Web Authentication System

![Web Authentication System](screenshot.png)

## Overview

This is a simple web authentication system that allows users to sign up, log in, and log out. The application is built using PHP and MySQL for user registration and login functionality. It utilizes PHP sessions to manage user authentication securely.

## Features

### Sign Up

Users can create an account by providing a unique username and password. The system checks for existing usernames to avoid duplication. If the provided username is already taken, the user will be prompted to choose another username.

### Login

Registered users can log in with their credentials. The system verifies the entered username and password against the database and grants access upon successful login. If the provided credentials are incorrect, the user will be shown an error message.

### Logout

Logged-in users can log out from their accounts by clicking on the "Logout" link. The application uses PHP sessions to manage user authentication and logout securely.

### Welcome Page

After successful login, users are greeted with a warm welcome message on the "Welcome" page, displaying their username. This personalized welcome message makes users feel acknowledged upon logging in.

## Requirements

- PHP server with MySQL support (e.g., XAMPP, WAMP, LAMP, etc.).
- MySQL database to store user information.

## Installation and Setup

1. Clone the repository to your local server using `git clone` or download the ZIP file.

2. Set up a MySQL database and import the required table schema using the provided SQL file (`database.sql`).

3. Configure the database connection in the `partials/_dbconnect.php` file.

4. Run the application using your PHP server (e.g., `php -S localhost:8000`).

## Usage

1. Access the web application through your web browser.
2. If you are a new user, click on the "Sign Up" link to create an account.
3. Enter a unique username and password for your account.
4. Upon successful account creation, you will be redirected to the "Login" page.
5. Log in using your registered username and password.
6. After successful login, you will be redirected to the "Welcome" page, where a warm welcome message will be displayed with your username.
7. To log out, click on the "Logout" link on the "Welcome" page.
8. You will be logged out, and the session will be destroyed.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.


## Screenshots

![Sign Up](screenshots/signup.png)
![Login](screenshots/login.png)
![Welcome](screenshots/welcome.png)
