# library_management
library_management
Library Management System

A full-stack library management system built using HTML, CSS, JavaScript, PHP, and MySQL with XAMPP. This project supports admin and customer roles, allowing for efficient book management and user interaction.


---

Features

Admin

Admin registration and login.

Add new books to the library.

View a list of all books.

Issue books to customers.

Admin dashboard displaying admin information.


Customer

Customer registration and login.

View available books.

View issued books.

Customer dashboard displaying user information.



---

Technologies Used

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL (via XAMPP)

Server: XAMPP (Apache and MySQL)



---

Getting Started

1. Prerequisites

Download and install XAMPP.

A web browser (e.g., Chrome, Firefox).


2. Installation

1. Clone or download the repository to your local machine:

git clone https://github.com/your-username/library-management.git


2. Move the project folder to your XAMPP htdocs directory:

C:\xampp\htdocs\library_management


3. Start XAMPP:

Open the XAMPP Control Panel.

Start the Apache and MySQL modules.



4. Import the database:

Open http://localhost/phpmyadmin in your browser.

Create a new database called library_management.

Import the library_management.sql file located in the project directory.



5. Open the project in your browser:

http://localhost/library_management/index.html

Database Details... ..... 

Tables

admins: Stores admin user information.

users: Stores customer user information.

books: Stores book information.

issued_books: Tracks issued books

library_management.sql) to create and initialize the database for the Library Management System project. You can save this file and include it in your GitHub repository.


---

library_management.sql

-- Create Database
CREATE DATABASE IF NOT EXISTS library_management;

-- Use the database
USE library_management;

-- Create 'admins' table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create 'books' table
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    availability ENUM('available', 'issued') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create 'issued_books' table
CREATE TABLE IF NOT EXISTS issued_books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    issue_date DATE NOT NULL DEFAULT CURRENT_DATE,
    return_date DATE NULL,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample data into 'admins' table
INSERT INTO admins (username, email, password) VALUES
('admin1', 'admin1@example.com', '$2y$10$examplehashedpassword1'), -- Replace with hashed passwords
('admin2', 'admin2@example.com', '$2y$10$examplehashedpassword2');

-- Insert sample data into 'users' table
INSERT INTO users (username, email, password, role) VALUES
('customer1', 'customer1@example.com', '$2y$10$examplehashedpassword3', 'customer'),
('customer2', 'customer2@example.com', '$2y$10$examplehashedpassword4', 'customer');

-- Insert sample data into 'books' table
INSERT INTO books (title, author, availability) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 'available'),
('To Kill a Mockingbird', 'Harper Lee', 'available'),
('1984', 'George Orwell', 'available'),
('Pride and Prejudice', 'Jane Austen', 'issued');

-- Insert sample data into 'issued_books' table
INSERT INTO issued_books (book_id, user_id, issue_date) VALUES
(4, 1, '2025-01-20'); -- 'Pride and Prejudice' issued to 'customer1'

-- Query to verify database structure and data
SHOW TABLES;
SELECT * FROM admins;
SELECT * FROM users;
SELECT * FROM books;
SELECT * FROM issued_books;
