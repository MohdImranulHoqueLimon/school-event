## Enterprise & Retail Management System

## Requirements

- PHP 5.3.7 or later
- MCrypt PHP Extension


## How to install

        git clone https://bitbucket.org/miboxlabs/animaldrugs

        cd animaldrugs

        composer install

then 

       php artisan migrate
       php artisan migrate --path=vendor/genealabs/laravel-governor/database/migrations

then
       
       php artisan db:seed --class=LaravelGovernorDatabaseSeeder
       php artisan db:seed --class=RoleTableSeeder
       php artisan db:seed

For permissions 
      
      php artisan db:seed --class=SuperUserSeeder

Now login with

      Admin: testuser@vivacom.com / 123456

# Note: Check GD library installed. Try to upload a image.