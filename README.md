Rememberable, query caching in Laravel 5
========================================

Rememberable is an Eloquent trait for Laravel 5.0+ that brings back the `remember()` query functions from Laravel 4.2. This makes it super easy to cache your query results for an adjustable amount of time.

    // Get a the first user's posts and remember them for a day.
    User::first()->remember(1440)->posts()->get();

It works by simply remembering the SQL query that was used and storing the result. If the same query is attempted while the cache is persisted it will be retrieved from the store instead of hitting your database again.

## Installation

Install using Composer, just as you would anything else.

    composer require watson/rememberable

The easiest way to get started with Eloquent is to create an abstract `App\Model` which you can extend your application models from. In this base model you can import the rememberable trait which will extend the same caching functionality to any queries you build off your model.

    <?php
    namespace App;

    use Illuminate\Database\Eloquent\Model as Eloquent;
    use Watson\Rememberable\Rememberable;

    abstract Model extends Eloquent
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

Alternatively, you can simply apply the trait to each and every model you wish to use `remember()` on.

## Usage

Using the remember method is super simple. Just pass the number of minutes you want to store the result of that query in the cache for, and whenever the same query is called within that time frame the result will be pulled from the cache, rather than from the database again.

    // Remember the number of users for an hour.
    $users = User::remember(60)->count();
