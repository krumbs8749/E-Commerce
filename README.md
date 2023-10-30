# E-Mensa Project Documentation

## Overview

The E-Mensa project is a web application built with Laravel and Vue.js. It serves as an online cafeteria system where users can view dishes with pictures, search for specific dishes, add them to their cart, and remove them. This documentation provides an overview of the project's structure and features.

## Features

1. **Dish Display**
   - Users can view a list of available dishes.
   - Each dish is accompanied by a picture, name, and description.

2. **Search Functionality**
   - Users can search for specific dishes using keywords or filters.

3. **Shopping Cart**
   - Users can add dishes to their shopping cart.
   - The shopping cart keeps track of selected dishes.

4. **Remove from Cart**
   - Users can remove dishes from their cart.

## Project Structure

The project's codebase is organized as follows:

- `app/`
  - Contains Laravel's application logic.
  
- `resources/`
  - `views/`
    - Contains Vue.js components and Blade templates for rendering the front-end.

- `routes/`
  - Defines web and API routes for the application.

- `public/`
  - Stores public assets like images and JavaScript files.

- `database/`
  - Migrations and seeders for setting up the database.

- `config/`
  - Application configuration files.



## Usage

To run the project locally, follow these steps:

1. Clone the repository to your local machine.
2. Install the required dependencies using `composer install` for Laravel and `npm install` for Vue.js.
3. Set up your database connection in the `.env` file.
4. Run migrations and seeders to populate the database with sample data.
5. Start the Laravel development server using `php artisan serve`.
6. Access the application in your web browser.

## Conclusion

The E-Mensa project combines the power of Laravel and Vue.js to create an efficient online cafeteria system. Users can easily view, search, and manage their selected dishes in a convenient shopping cart.

For further details, consult the project's source code and documentation.
