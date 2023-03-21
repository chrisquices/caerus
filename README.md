<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="#">
    <img src="public/assets/backend/imgs/logo-big.png" alt="Logo" height="70">
  </a>
</div>

## Built With

[![Laravel][Laravel.com]][Laravel-url]
[![Livewire][Livewire.com]][Livewire-url]
[![Bootstrap][Bootstrap.com]][Bootstrap-url]
[![JQuery][JQuery.com]][JQuery-url]

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com

[Livewire.com]: https://img.shields.io/badge/Livewire-fb6fa9?style=for-the-badge&logo=livewire&logoColor=white
[Livewire-url]: https://jquery.com

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com

[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com

## Prerequisites

* PHP ^8.1

## Installation

1. Download or clone the repository (zip download recommended)
    ```
    git clone https://github.com/rosphrethic/caerus.git
    ```

1. Install packages
   ```
   composer install
   ```

1. Create your environment file
   ```
   cp .env.example .env
   ```

1. Generate project key
   ```
   php artisan key:generate
   ```

1. Create storage folder link
   ```
   php artisan storage:link
   ```

1. Configure your environment file, do not forget the following variables
    ```
    APP_NAME=Caerus
    APP_URL=http://caerus.test
    ```

1. Run migrations
   ```
   php artisan migrate --seed
   ```

   This will seed the database with demo users with the following credentials
   ```
   Frontend Candidate User
   email: democandidate@caerus.com
   password: password
   
   Backend Administrator User
   email: admin@caerus.com
   password: password
   
   Backend Company User  
   email: bancobasa@caerus.com
   password: password
   ```

   There are other seeders for the other tables, for more information view:
    ```
    /caerus/database/seeders/DatabaseSeeder.php
    ```

## Usage

To access the frontend, go to:

   ```
   http://caerus.test
   ```

To access the backend, go to:

   ```
   http://caerus.test/backend
   ```
