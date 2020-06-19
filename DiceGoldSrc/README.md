<p align="center"><img src="https://dicegold.com/images/logo.png" width="400"></p>

## About DiceGold

DiceGold is a web application for dice game

## Install

- Clone repository <br>
    `git clone`
- Install composer dependencies <br>
    `composer install`
- Install NodeJS dependencies <br>
    `npm install`
- Configure database
    - rename '.env.example' to '.env' at DiceGold directory.
    - configure database host, port, database, username, password etc.
- Migrate database <br>
    `php artisan migrate`
- Build assets <br>
    `npm run public | npm run dev`



## Developing references

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Laravel Broadcast Redis Socket io Tutorial](https://www.itsolutionstuff.com/post/laravel-broadcast-redis-socket-io-tutorial-example.html)**


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
