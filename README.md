Rememberable, query caching in Laravel 5
========================================

Rememberable is a trait for Laravel 5.0+ that brings back the `remember()` query functions from Laravel 4.2. This makes it super easy to cache your query results for an adjustable amount of time.

    // Get the number of users and remember it for an hour.
    DB::table('users')->remember(60)->count();

    // Get a the first user's posts and remember them for a day.
    User::first()->remember(1440)->posts;

It works by simply remembering the SQL query that was used and storing the result. If the same query is attempted while the cache is persisted it will be retrieved from the store instead of hitting your database again.

## Installation

Install using Composer, just as you would anything else.

    composer require watson/rememberable

And activate the service provider in `config/app.php`. You'll only need to use the service provider if you want the caching functionality on the normal query builder (for example, if you use the `DB` facade).

    'Watson\Rememberable\RememberableServiceProvider',

If you also want to use the `remember()` functions when building queries off your Eloquent models, read on. It is recommended that you install Rememberable for both the query builder and Eloquent, for consistency.

The easiest way to get started with Eloquent is to create an abstract `App\Model` which you can extend your application models from. In this base model you can import the rememberable trait which will extend the same caching functionality to any queries you build off your model.

    <?php
    namespace App;

    use Illuminate\Database\Eloquent\Model as Eloquent;
    use Watson\Rememberable\Rememberable;

    abstract Model extends Model
    {
        use Rememberable;
    }

Now, just ensure that your application models from this new `App\Model` instead of Eloquent.

    <?php
    namespace App;

    class Post extends Model
    {
        //
    }