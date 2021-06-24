[![Manuscrite](https://raw.githubusercontent.com/Thavarshan/manuscrite/main/.github/banner.svg)](https://github.com/Thavarshan/manuscrite)

# Manuscrite

## Introduction

Manuscrite is in fact a SPA powered by Vue, InertiaJS and webpack. It is composed of two parts: a minimalistic static site generator with a Vue-powered theming system, and a default theme optimized for writing technical documentation. It was created to support the documentation needs of any project.

## Installation

Please check the official **Laravel** installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

```bash
git clone https://github.com/Thavarshan/manuscrite.git
```

Switch to the repo folder

```bash
cd manuscrite
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
```

Run the database migrations (**Set the database connection in .env before migrating**)

```bash
php artisan migrate
```

Start the local development server

```bash
php artisan serve
```

You can now access the server at http://localhost:8000

**TL;DR command list**

```bash
git clone https://github.com/Thavarshan/manuscrite.git
cd manuscrite
composer install
cp .env.example .env
php artisan key:generate
```

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

```bash
php artisan migrate
php artisan serve
```

## Security Vulnerabilities

Please review [our security policy](https://github.com/thavarhan/manuscrite/security/policy) on how to report security vulnerabilities.

## License

Manuscrite is open-sourced software licensed under the [MIT license](LICENSE).
