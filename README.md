<p align="center">
<a href="https://getbootstrap.com" target="_blank"><img src="https://miro.medium.com/v2/resize:fit:400/1*onZhQJU7A3ab6V1sHfMRkQ.jpeg" height="150"></a><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="150"></a></p>

## Steps to use this project correctly:

-   Copy and paste the `.env.example` file and rename it into `.env` **without removing the `env.example` file**
-   Run `composer install` to install all our composer packages
-   Run `php artisan key:generate` to generate our custom application key
-   Run `npm i` to install all our npm packages
-   Run `php artisan migrate` & `php artisan db:seed` to create the tables with the data
-   Run on two separeted terminals:
    -   run `npm run dev` to build iteratively our front-end packages and code
    -   run `php artisan serve` to build iteratively our back-end packages and code
-   Start changing the world with your oustanding code!

## Description:

-   The index page displays all catalog products. Users can select a product to purchase, which adds it to the cart with a quantity of one. Selecting the same product again increases the quantity by one in the cart. Users can also view the cart directly from this page without selecting a product.

-   The shopping cart page allow the user to change product quantities, remove products, and make purchases. It shows the initial and taxed prices, along with the total taxed amount due.

-   The receipt page lists the purchased product's name, quantity, taxed price, the total product price before tax, and the tax applied.
