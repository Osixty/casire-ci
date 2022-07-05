# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation

Use these steps to create a local installation for development and testing.

1. Clone the repo: `git clone https://github.com/Osixty/casire-ci.git`
2. Work in the repo directory: `cd casire-ci`
3. Make sure the **writable** folder is accessible: `chmod -R 777 writable` (linux)
4. Install dependencies: `composer install`
5. Create your **.env** file: `cp env .env`
6. Edit **.env** and set at least the following:
	* `CI_ENVIRONMENT = development`		
    * `database.default.hostname = localhost`
    * `database.default.database = [namadatabase]`
    * `database.default.username = [user anda]`
    * `database.default.password = [password] `
    * `database.default.DBDriver = MySQLi`

The website is intended to live on the same server as the forums, and uses the forum
database to pull in the most recent posts. When developing locally, this poses a challenge.
To make local development simpler, a migration and seed have been provided to setup a 
table with some mock data that can be used in place of having a local MyBB install.

1. Migrate the database: `php spark migrate -all`
2. Run the seeder: `php spark db:seed All`

At this point you should have a usable version of the current code! Try launching it locally:

1. From the repo directory start serving the website: `php spark serve`
2. In your web browser of choice navigate to the local URL: `http://localhost:8080`
## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
