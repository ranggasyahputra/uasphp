# News Article Management System

## Overview

The News Article Management System is a web application that allows users to input, edit, delete, and manage news articles and categories. Built using PHP and MySQL, this application provides a user-friendly interface for managing news content, including titles, categories, headlines, and full articles.

## Features

- **Input News Articles**: Users can add new news articles with titles, categories, headlines, and content.
- **Edit News Articles**: Users can edit existing articles to update their content.
- **Delete News Articles**: Users can delete articles with a confirmation prompt.
- **Category Management**: Users can create, edit, and delete categories for better organization of articles.
- **User  Notifications**: Toast notifications inform users of successful or failed operations.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Icons**: Bootstrap Icons

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/news-article-management.git
   cd news-article-management

## Set Up the Database:

1. Create a MySQL database and import the SQL schema provided in `database/schema.sql`.
2. Update the database connection settings in `koneksi.php`:

   ```php
   $host = 'localhost'; // Database host
   $user = 'your_username'; // Database username
   $password = 'your_password'; // Database password
   $database = 'your_database'; // Database name

