<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Learning Activity 10 — Monster Hunter Lookup Table

G1: Which column did you turn into a table, and why that one and not another?
I converted platform into a platforms lookup table because platform categories repeat across records and can be extended with attributes. title, price, and stock are unique or numeric, making platform the only column that represents a reusable entity.

G2: What number did screenshot 6 show, and why exactly that number?
It showed 8 queries (2 setup queries + 6 lazy-loading queries). Two queries fetched the main game records and filter data, and as the Blade view iterated through each row, Eloquent executed 6 additional queries (one per row) to lazy-load each platform relationship.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
Eloquent would look for a foreign key named platforms_id on the table instead of platform_id. Since that column does not exist in the database, Laravel would throw a QueryException.

# Learning Activity 11 — Monster Hunter CRUD

G1: Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
Route model binding requires the controller parameter to be type-hinted with the model class (Game), and its variable name ($monsterhunter) must match the route resource segment name ({monsterhunter}) exactly. If only the type-hint is correct but the variable name is wrong, Laravel will fail to inject the model instance silently, resulting in $monsterhunter being null or uninitialized without throwing an explicit error.

G2: Your Delete link opened the detail page instead of deleting anything. Explain why.
HTML <a> links can only issue HTTP GET requests. In Laravel resource routing, GET /monsterhunters/{monsterhunter} maps directly to the show() method, whereas destroy() requires an HTTP DELETE request sent via a form with @method('DELETE').

G3: old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
If the second fallback argument is left out, the form fields will render completely blank when first loaded because no session flash data exists yet. If only the second argument was used without old(), failed validation re-submissions would overwrite user-entered inputs back to the database defaults instead of retaining the submitted values.