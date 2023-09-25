<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel 9 Project with Vite and Tailwind CSS - Task Management

This project is a web application developed using Laravel 9 with Vite for frontend development and Tailwind CSS for styling. It enables users to efficiently manage their tasks. Users can create, read, update, and delete tasks, assigning them priorities. Additionally, the system features user authentication, registration, and access control to ensure that each user can only interact with their tasks while having the ability to view all tasks.

## Features

- **User Authentication**: Users can register, log in, and manage their accounts.
- **User Registration**: New users can register for an account.
- **Task CRUD**: Each user can easily create, read, update, and delete their tasks.
- **Task Priorities**: Tasks can be assigned priorities to help users organize their work.
- **Access Control**: Users can manipulate only their tasks but have access to view all tasks in the system.

## Technologies Used

- **Laravel 9**: A powerful PHP framework that simplifies web application development.
- **Vite**: A build tool that enables fast and efficient frontend development.
- **Tailwind CSS**: A highly customizable CSS framework that facilitates the creation of attractive and responsive interfaces.
- **Database**: Laravel utilizes Eloquent ORM to interact with the database. You can configure your preferred database in the `.env` file.
- **User Authentication**: Laravel provides a ready-to-use user authentication system.
- **User Registration**: New users can register for accounts.

## Installation Requirements

To run this project in your local environment, make sure you have the following installed:

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/)
- [Git](https://git-scm.com/)

Follow these steps:

1. Clone this repository to your local machine: `git clone https://github.com/hadominguez/tasks-laravel-tailwind.git`
2. Navigate to the project directory: `cd tasks-laravel-tailwind`
3. Copy the `.env.example` file to `.env` and configure your database settings.
4. Run `composer install` to install Laravel dependencies.
5. Run `npm install` to install JavaScript dependencies.
6. Run `php artisan key:generate` to generate an application key.
7. Run `php artisan migrate` to create the database tables.
8. Run `npm run dev` to compile the frontend assets.
9. Finally, run `php artisan serve` to start the development server.

You can now access the application at `http://localhost:8000` in your web browser.

## Usage

1. Register as a new user or log in if you already have an account.
2. Create new tasks from the dashboard.
3. Manage your tasks from the tasks page.
4. You can view all available tasks in the task list, but you can only edit or delete your own tasks.

## Contribution

If you wish to contribute to this project, you are welcome to do so! Feel free to submit pull requests or report issues on the [GitHub repository](https://github.com/hadominguez/tasks-laravel-tailwind).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
