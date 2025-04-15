Laravel Blog System
A simple blog system built using Laravel from scratch . This system allows users to create, read, update, and delete blog posts, and manage blog categories and authors.
📁 Project Structure
This Laravel-based blog project uses a MySQL database and includes the following main features:
- Blog post management (CRUD)
- Category management
- Author management
🧾 Database Overview
The database is named: blog_system1
Tables
authors
- id (INT, Primary Key)
- name (VARCHAR)
- email (VARCHAR)
- password (VARCHAR)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
categories
- id (INT, Primary Key)
- name (VARCHAR)
- description (TEXT, Nullable)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
posts
- id (INT, Primary Key)
- title (VARCHAR)
- content (TEXT)
- category_id (INT, Foreign Key -> categories.id)
- author_id (INT, Foreign Key -> authors.id)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
Note: Foreign key relationships are assumed based on column naming conventions.
🛠 Setup Instructions
1. Clone the Repository
   git clone https://github.com/yourusername/laravel-blog-system.git
   cd laravel-blog-system
2. Install Dependencies
   composer install
   npm install && npm run dev
3. Set Up Environment File
   cp .env.example .env

Then, configure your .env file:
   DB_DATABASE=blog_system1
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
4. Generate App Key
   php artisan key:generate
5. Import Database
   mysql -u root -p blog_system1 < blog_system1.sql
6. Run Migrations (if needed)
   php artisan migrate
7. Start the Server
   php artisan serve
🔐 Authentication
The project uses a custom-built authentication system (without Breeze). You will find:
- Custom login and registration forms
- Middleware protection for routes
📄 Features
- Full CRUD for blog posts
- Categorization of posts
- Simple author/user management
- Timestamps for post tracking
- Secure login system
📦 Tech Stack
- PHP 8+
- Laravel 10+
- MySQL
- Blade Templating
- HTML/CSS/JavaScript
📸 credentials
Users_login_credentials
•	Philemon
Email:philemon000@gmail.com
Password:12345678
•	Christine
Email:chris21@gmail.com
Password:12345678

🤝 Contributing
Contributions are welcome! Fork the repository and submit a pull request.
📃 License
This project is open-source and available under the MIT License.
