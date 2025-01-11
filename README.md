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

## Usage
1. Input News:

- Navigate to the input form to add a new news article.
- Fill in the required fields and submit the form.

2. Edit News:

- Click on an article to edit its details.
- Update the fields and submit the form to save changes.

3. Delete News:

- Click on the delete button for an article to confirm deletion.
- A confirmation prompt will appear; choose to delete or cancel.

4. Manage Categories:

- Navigate to the category management page to view, add, edit, or delete categories.

5. View Notifications:

- Toast notifications will appear at the bottom of the screen to inform you of the success or failure of your actions.
