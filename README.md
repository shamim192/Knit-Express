# Knit Express

----------

# Getting started

## Installation

Clone the repository or downlaod the project from github

    git clone https://github.com/shamim192/Knit-Express.git

Copy this project in htdocs folder and open the folder location in cmd.

Now rename the "env.example" file to ".env"

You can configure the database informations here.

Now open cmd and run some commands...

Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate 

now seed data using 
    
    php artisan db:seed 

link storage using 
    
    php artisan storage:link 

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

let's have a look at some screenshots of the project's frontend pages

## Homepage

# ![Home Page](public/admin-assets/images/home.png)

## About Us

# ![About Page](public/admin-assets/images/about-us.png)
    

## Admin Login Credentials

email: admin@gmail.com 

password: 12345678

**you can change it from database as per your need.

## Feature's:

Multiple Category Products
Product Mangements
Blogs
SEO Setup

let's have a look at some screenshots of the project pages

## Log In page

# ![Log In Page](public/admin-assets/images/login.png)

## Dashboard

# ![Dashboard](public/admin-assets/images/dashboard.png)

## Product

# ![product](public/admin-assets/images/product.png)
