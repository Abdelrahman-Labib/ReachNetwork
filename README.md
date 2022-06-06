### Quick Project Setup
1. Run `sudo git clone https://github.com/Abdelrahman-Labib/ReachNetwork.git`
2. Create a MySQL database for the project
    * ```mysql -u root -p```
    * ```create database laravel;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env`
5. Run `sudo composer update` from the projects root folder
6. From the projects root folder run `sudo chmod -R 755 ../ReachNetwork`
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `composer dump-autoload`

### Postman Collection
```https://www.getpostman.com/collections/79895e00e58fec218898```
