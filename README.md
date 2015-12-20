# Schoo

[![Build Status](https://travis-ci.org/andela-sakande/schoo.svg)](https://travis-ci.org/andela-sakande/schoo)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-sakande/schoo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-sakande/schoo/?branch=master)
[![Coverage Status](https://coveralls.io/repos/andela-sakande/schoo/badge.svg?branch=master&service=github)](https://coveralls.io/github/andela-sakande/schoo?branch=master)
[![StyleCI](https://styleci.io/repos/47362848/shield)](https://styleci.io/repos/47362848)
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-sakande/PotatoORM/blob/master/LICENSE)

Schoo is an Awesome Simple Learning Management System which enable individuals to share stuffs easily
thereby making everyone better by learning from wonderful people on an easy-to-use platform.

## Usage

To download and use this project you need to have the following installed on your machine

- Composer
  Visit the [official website](https://getcomposer.org/doc/00-intro.md) for installation instructions.
- Laravel homestead
  Visit [Laravel website](http://laravel.com/docs/5.1/homestead) for installation and setup instructions.

When you have completed the above processes, run:

```bash
$ git clone https://github.com/andela-sakande/schoo
`````
to clone the repository to your working directory. This step presumes that you have git set up and running.

Run

```bash
$ composer install
```
to pull in the project dependencies.

Also run on homestead environment
```bash
    php artisan migrate
```
to configure your database.
Now you are set up and ready to run.

## Project features
- Username/Email Signup/Login authentication
- Social authentication
- User Profile Management
- Youtube course post - Authenticated users only!
- Browse all  courses - Authenticated users only!
- Browse  courses by category
- View single course
- Personal Upload Management - Authenticated users only!

* Other interesting features to be added soon

Visit [Schoo demo page](https://schoo.herokuapp.com/) to view the project demo.

## Change log

Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit test
```

## Contributing

Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits

Schoo is maintained by `Surajudeen AKANDE`.

## License

Schoo is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.