# Welcome to AmaXone

AmaXone E-commerce Store is a comprehensive e-commerce website built using PHP7, HTML5 and TailwindCSS. 
It facilitates business transactions between service providers and customers, offering features like product management, shopping cart, order management, payment gateways, customer management, and much more.

## Features

1. User Registration & Login System
2. Product Browsing (with categories & filters)
3. Shopping Cart Functionality
4. Secure Checkout Process
5. Multiple Payment Gateways Integration
6. Customer Profile and Order History
7. Admin Dashboard for Managing Products, Categories, Orders, and Users
8. Responsive UI that works on desktop and mobile devices

## Requirements

1. PHP 7.4 or higher
2. MySQL 5.7 or higher
3. Composer for PHP package management
4. A web server (Apache/Nginx)
5. Modern web browser (Chrome, Firefox, Safari, Edge)

## Installation

1. Clone or download the project repository to your local machine.
2. Navigate to the project directory through your terminal.
3. Run `composer install` to download all necessary dependencies.
4. Create a new MySQL database and import the `/SQL/database.sql` file located in the root directory.
5. Edit the `/src/Config/Conf.php` file in the root directory with your database connection details.
6. Host the project on your local server (e.g., XAMPP, MAMP, or a virtual host).
7. Open a web browser and navigate to the URL of your local server.

## Usage

1. **Customer Usage:** As a customer, you can register for an account, login, browse products, add items to your cart, and proceed with checkout.

2. **Admin Usage:** As an admin, you can add, edit, or delete products/categories, manage orders, and manage users. The default admin credentials are:

   ```
   Username: admin
   Password: admin
   ```
   (You should know to change them immediately)

## Security

AmaXone E-commerce Store is built with a strong focus on security:

- All passwords are hashed before being stored in the database.
- The application prevents SQL injection attacks.
- XSS attacks are mitigated by proper escaping of output data.
