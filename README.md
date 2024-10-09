# Simple Book Collection Application

A simple book collection application. Coding test submission for Laravel Developer position as [Figarts](https://figarts.co).

## Requirements - Very Important!

Before installing this application, make sure you have the following installed:

-   [PHP v8.2](https://www.php.net/downloads.php)
-   [MySQL](https://www.mysql.com/downloads/)
-   [Composer](https://getcomposer.org/download/)
-   [NPM](https://www.npmjs.com/package/download)
-   All common extensions for PHP 8.2 especially `mb_string`.
-   Create a fresh database for the application.

## Installation

1. Clone the repo by running the following command in your terminal.

```sh
git clone https://github.com/justiceroyale1/simple-book-collection.git
```

2. CD into the root directory by running the following command in your terminal.

```sh
cd simple-book-collection
```

3. Install dependencies by running the following commands in your terminal.

```sh
composer install
```

```sh
npm install
```

4. Copy the `.env.example` file and rename it to `.env` by running the following command in your terminal.

```sh
cp .env.example .env
```

5. Open the `.env` file in your favorite editor. Modify the following values to match yours. **NB: Make sure you are using the values for the database you created earlier.**

```
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

6. Create the app's tables by running the following command in your terminal.

```sh
php artisan migrate
```

7. Create some sample records by running the following command in your terminal.

```sh
php artisan db:seed
```

8. Build the app by running the following command in your terminal.

```sh
npm run build
```

9. Start the app's server running the following command in your terminal.

```sh
php artisan serve
```

The above command should display the app's url in your terminal. It's usually [localhost:8000](http://localhost:8000). Open the link on your browser.
