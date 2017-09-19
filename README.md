# Basix for Laravel 5.4
This package includes Laravel 5.4, along with various of the popular, and much used extensions for Laravel - all installed, configured and tested. 

Incredibly useful if you are just getting started with Laravel, or for saving time when working on a new project.

**New:** Added Excel extension "maatwebsite/excel"

## How to Install?

Git pull/clone the package to the machine and install the packages.: 
```
git clone https://github.com/santoshachari/Laravel-Basix-5.4.git
composer install
php artisan key:generate
```

## Documentation

### Sample File Upload code
`App\Http\Controllers\UploadController.php` has the code for managing the file upload and receiving. 


### Generate Migration schema and Model from artisan commands

Thanks to [Laracasts/Generators](https://github.com/laracasts/Laravel-5-Generators-Extended) , you can generate migrations, along with schemas using commands like:
```
// Auto declare table names and columns
php artisan make:migration:schema create_users_table --schema="username:string, email:string:unique"

// Easy foreign relationships
php artisan make:migration:schema create_posts_table --schema="user_id:integer:foreign, title:string, body:text"

// Super easy pivot tables
php artisan make:migration:pivot tags posts
```

Generate Models from tables in database. (Courtesy [Laracademy/Generators](https://github.com/laracademy/generators) )
```
php artisan generate:modelfromtable --table=posts
```
**Important Note:** Do not use the above command for "users" etc, as it would override the class to extend "Model" rather than "Authenticatable".
 

### Easily show Flash messages

Show Flash messages across the application using [laracasts/flash](https://github.com/laracasts/flash) , even as modals if you use Bootstrap. 
```
flash()->success('Hey There! Welcome to Basix for Laravel 5.4');

// For Bootstrap Modals
flash()->overlay('Modal Message', 'Modal Title')
```

Include the following in your blade template file
```
@include('flash::message')
```

### Excel Import and Export
Now import (& Export) data from Excel Sheets. Can be used for seeding: 
 ```
 Excel::load(storage_path('import/Countries.xlsx'), function ($reader) {
             $data = $reader->get();
             foreach ($data as $datum) {
 
                 \App\Country::create([
                     'name' => $datum->country,
                     'official_name' => $datum->full_name,
                     'code' => $datum->iso_3166_1,
                     'code_2' => $datum->iso_3166_2,
                     'long' => $datum->longitude,
                     'lat' => $datum->latitude,
                     'zoom_level' => $datum->zoom_level,
                 ]);
             }
         });
 ```
 For more details refer to documentation for ["maatwebsite/excel"](http://www.maatwebsite.nl/laravel-excel/docs/import) 

### Image Manipulation
Basix also includes intervention/image and intervention/imagecache which let you manipulate images and cache directly via url.

```
/imgcache/small/charminar.jpg
/imgcache/medium/charminar.jpg
/imgcache/large/charminar.jpg

//Custom Filters
/imgcache/disabled/charminar.jpg

//Download
/imgcache/download/charminar.jpg
```

Check the example code in 'images.blade.php' for more details. 

### Slugging

Thanks to [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable) , create SEO friendly urls like
```
http://yourapplication.com/this-is-a-new-post
```

### Multiple Authentication
Now easily add multiple kinds of authentication to your application, by running simple commands like:
```
php artisan multi-auth:install employee -f
```
This would create separate controllers, route file and middleware for you along with adding the routes to web.php
The package already comes with a sample code for a "Admin" login. Such a timesaver by [Hesto](https://github.com/Hesto/multi-auth) . 

### Social Authentication
Working code for Social Authentication (for Facebook) has been added to this package. Add your facebook app details to your `.env` file.
```
FACEBOOK_ID=YOUR_APP_ID
FACEBOOK_SECRET=YOUR_APP_SECRET
FACEBOOK_URL=http://yourapplication.dev/auth/facebook/callback
```

To add additional social authentication: 

1.Update `config/services.php`
```
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_ID'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('FACEBOOK_URL'),
    ],
```
2.Update `app\HTTP\Controllers\Auth\SocialController.php`. You can simply duplicate the functions for specific drivers. 

3.Update `web.php`. 

### Debug bar for Laravel
Laravel Debug bar is included with this package. You can disable when you set your environment (APP_ENV) as anything but 'local' in your `.env` file. Courtesy: [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)

### Support for your IDE
Helper classes are installed, which helps PhpStorm recognize your laravel classes, so you don’t end up with unnecessary error messages from your IDE. Read the documentation for [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) for setting up for sublime.   
