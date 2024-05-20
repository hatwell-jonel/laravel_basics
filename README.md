# LARAVEL 7 - MYSQL

## Create using

-   Laravel Auth
-   Bootstrap 5
-   CRUD
-   Yajra Datable
-   Ajax
-   Jquery
-   Blade

### Make

`php artisan make:{whatEver}`

to view all shortcut flag use:

`php artisan make:{whatEver} --help`

---

### How to create fake data

1. Create a Factory:
   `php artisan make:factory {fileName}`

2. Modify the Factory file:

```php
<?php

/\*_ @var \Illuminate\Database\Eloquent\Factory $factory _/

use App\Employee;
use App\Helper\Helper;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $helper = new Helper();

    return [
        'employee_id' => $helper->generateEmployeeId(),
        'firstname' => $faker->firstame,
        'lastname' => $faker->lastName,
        'gender' => $faker->randomElement(['F', 'M']),
        'birthdate' => $faker->date(),
        'monthly_salary' => $faker->randomFloat(2, 1000, 10000),
    ];

});
```

3. In database\seeds\DatabaseSeeder.php initialize the factory:

```php
  public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Employee::class, 10)->create();
    }
```

---

### How to create user middleware

1. Make the middleware for the user
   `php artisan make:middleware {filename}`

2. Modify the code in middleware file to your desired condition
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
```
3. Register the middleware in Kernel.php
```php
    protected $routeMiddleware = [
        // your created middleware
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'user' => \App\Http\Middleware\UserMiddleware::class,
    ];
```

4. Declare in web.php

Like This
```php
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::get('/', [ViewController::class, 'admin'])->name('admin.index');
    });

    Route::prefix('user')->middleware(['user'])->group(function () {
        Route::get('/', [ViewController::class, 'user'])->name('user.index');
    });
```

Way 1
```php
    Route::get('/example', function () {
        // Your route logic...
    })->middleware('my-middleware');
```

Way 2
```php
    Route::group(['middleware' => 'my-middleware'], function () {
        // Routes that use the 'custom' middleware group...
    });
```


5. Go to \vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php then modify the autheticated method
```php
  protected function authenticated(Request $request, $user)
    {
        // Check user's role and redirect accordingly
        if ($user->role === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.index');
        } else {
            // Handle other roles or no role assigned
            return redirect()->route('home');
        }
    }
```

## Author

-   LinkedIn - [Jonel Hatwell](https://www.linkedin.com/in/jonel-hatwell/)
