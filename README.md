# Primary School CMS and Website

A modern, professional, responsive CMS-driven school website built with Laravel and FilamentPHP.

## Features

### Public Website
- **Homepage** - Hero section, welcome message, statistics, testimonials
- **About Page** - School history, mission & vision, leadership, facilities
- **Academics** - Curriculum, programs, activities
- **Admissions** - Online application form with admin review
- **News/Blog** - Full-featured blog with categories and tags
- **Gallery** - Photo albums and school activities
- **Contact** - Contact form and information

### Admin Dashboard (FilamentPHP)
- Role-based access control
- Page management with SEO metadata
- Blog post management with rich editor
- Media library and asset management
- Admission applications tracking
- Settings management
- User and role management

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Admin Panel**: FilamentPHP 3
- **Database**: MySQL
- **Authentication**: Laravel Auth with Spatie Permission
- **Media Handling**: Spatie Media Library
- **SEO**: Spatie Laravel SEO

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env`
3. Generate application key: `php artisan key:generate`
4. Configure database in `.env`
5. Run migrations: `php artisan migrate`
6. Seed database: `php artisan db:seed`
7. Create admin user: `php artisan tinker` then `App\Models\User::factory()->admin()->create()`
8. Serve: `php artisan serve`

## Project Structure

```
app/
├── Actions/           # Reusable action classes
├── Services/          # Business logic services
├── Models/            # Eloquent models
├── Http/
│   ├── Controllers/   # Web and API controllers
│   └── Middleware/    # Custom middleware
├── Filament/          # FilamentPHP resources
└── Policies/          # Authorization policies

database/
├── migrations/        # Database migrations
└── seeders/          # Database seeders

resources/
├── views/            # Blade templates
├── components/       # Reusable Blade components
├── css/             # Stylesheets
└── js/              # JavaScript files

routes/
├── web.php           # Web routes
└── api.php           # API routes
```

## Default Admin Panel URL

Access the admin panel at `/admin`

Default credentials are created during seeding.

## Support

For issues and feature requests, please refer to the documentation.

## License

MIT License
