# Primary School CMS Development Guide

## Project Overview

A modern, professional CMS-driven school website built with Laravel 11, FilamentPHP, and Tailwind CSS.

### Key Features

- **Public Website** - Professional homepage with modern design
- **Admin Dashboard** - Full-featured CMS powered by FilamentPHP
- **Content Management** - Pages, posts, galleries, admissions
- **Role-Based Access** - Super Admin and Editor roles
- **SEO Ready** - Meta tags, slugs, sitemaps
- **Responsive Design** - Mobile-first Tailwind CSS styling
- **Media Management** - Integrated media library

## Tech Stack

- **Laravel** 11 - Backend framework
- **FilamentPHP** 3 - Admin panel
- **Tailwind CSS** 3 - Styling
- **Alpine.js** 3 - Interactivity
- **MySQL** 8+ - Database
- **Spatie Packages** - Permissions, Media, SEO

## Getting Started

### Installation

```bash
# Clone the project
cd primary-school-cms

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env
# DB_DATABASE=primary_school_cms
# DB_USERNAME=root
# DB_PASSWORD=

# Run migrations and seeders
php artisan migrate
php artisan db:seed

# Build assets
npm run build

# Link storage
php artisan storage:link

# Start development server
php artisan serve
```

### Default Credentials (After Seeding)

- **Email**: admin@school.local
- **Password**: password
- **Admin URL**: http://localhost:8000/admin

## Project Structure

```
app/
├── Models/              # Database models
├── Http/
│   ├── Controllers/     # Web controllers
│   └── Middleware/      # Custom middleware
├── Services/            # Business logic layer
├── Filament/            # Admin resources
├── Policies/            # Authorization
└── Actions/             # Reusable actions

resources/
├── views/               # Blade templates
├── components/          # Reusable components
├── css/                 # Stylesheets
└── js/                  # JavaScript files

database/
├── migrations/          # Schema changes
└── seeders/             # Demo data

routes/
├── web.php              # Web routes
└── api.php              # API routes
```

## Key Concepts

### Models

- **User** - Admin and staff users with roles
- **Page** - Static pages with SEO metadata
- **Post** - Blog posts with categories and tags
- **Category** - Blog post categories
- **Gallery** - Photo galleries and albums
- **GalleryImage** - Individual gallery images
- **Admission** - Student admission applications
- **Contact** - Contact form submissions
- **Setting** - Configuration settings

### Controllers

- **HomeController** - Homepage and dashboard
- **PageController** - Static pages
- **BlogController** - Blog listings and posts
- **GalleryController** - Gallery views
- **AdmissionController** - Admission form
- **ContactController** - Contact form

### Services

- **SettingsService** - App configuration
- **BlogService** - Blog-related logic
- **GalleryService** - Gallery operations

## Admin Panel (FilamentPHP)

The admin panel at `/admin` includes:

- **Users** - Manage staff and admin accounts
- **Pages** - Create and manage static pages
- **Posts** - Blog post management
- **Categories** - Blog categories
- **Galleries** - Photo galleries
- **Admissions** - Review student applications
- **Contacts** - View contact form messages
- **Settings** - Configure site settings

## Public Website Routes

```
GET  /                    # Homepage
GET  /about              # About page
GET  /academics          # Academics page
GET  /blog               # Blog listing
GET  /blog/{slug}        # Individual post
GET  /blog/category/{slug}  # Category posts
GET  /gallery            # Gallery listing
GET  /gallery/{slug}     # Gallery details
GET  /admissions         # Admission form
POST /admissions         # Submit application
GET  /contact            # Contact form
POST /contact            # Submit message
```

## Customization

### Adding New Pages

1. Create via FilamentPHP admin panel
2. Set slug (URL-friendly name)
3. Add content with rich editor
4. Configure SEO metadata
5. Publish when ready

### Adding Blog Posts

1. Go to Posts in admin
2. Create new post with title and content
3. Select category
4. Add featured image
5. Set publish date
6. Mark as featured if needed

### Managing Galleries

1. Create gallery with title
2. Upload images
3. Set display order
4. Publish when ready

### Customizing Settings

1. Edit settings in admin panel
2. Update school name, contact info
3. Set homepage hero content
4. Configure social media links

## Development Workflow

### Frontend Development

```bash
# Watch Tailwind CSS
npm run dev

# Build for production
npm run build
```

### Database Changes

```bash
# Create migration
php artisan make:migration create_users_table

# Run migrations
php artisan migrate

# Rollback
php artisan migrate:rollback
```

### Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter=TestName
```

## Best Practices

### Code Style

- Follow PSR-12 standards
- Use type hints for all parameters
- Document complex logic
- Keep controllers lean

### Database Queries

- Use eager loading to prevent N+1
- Use pagination for large datasets
- Create indexes for frequently queried columns

### Security

- Always validate user input
- Use authorization policies
- Sanitize output in templates
- Keep dependencies updated

### Performance

- Cache queries when appropriate
- Optimize images before upload
- Lazy load images on frontend
- Use CDN for static assets

## Common Commands

```bash
# Artisan commands
php artisan tinker                  # Interactive shell
php artisan make:model ModelName    # Create model
php artisan make:migration name     # Create migration
php artisan make:controller Name    # Create controller
php artisan queue:work              # Process jobs
php artisan cache:clear             # Clear cache
php artisan optimize:clear          # Clear optimizations

# Database
php artisan migrate                 # Run migrations
php artisan db:seed                 # Run seeders
php artisan db:wipe                 # Clear database

# Filament
php artisan filament:install        # Install Filament
php artisan shield:install          # Install Shield
```

## Troubleshooting

### Database Connection Issues

Check `.env` database credentials:
```bash
php artisan db:table users
```

### Migration Errors

Rollback and retry:
```bash
php artisan migrate:rollback
php artisan migrate
```

### Storage Permissions

Fix directory permissions:
```bash
chmod -R 775 storage bootstrap/cache
php artisan storage:link
```

### Asset Issues

Rebuild assets:
```bash
npm run build
php artisan optimize:clear
```

## Deployment Checklist

- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_ENV=production`
- [ ] Generate new `APP_KEY`
- [ ] Run migrations on production server
- [ ] Configure caching
- [ ] Set up file uploads storage
- [ ] Configure mail service
- [ ] Set up SSL/HTTPS
- [ ] Configure backups
- [ ] Monitor error logs

## Support & Documentation

- [Laravel Documentation](https://laravel.com/docs)
- [FilamentPHP Documentation](https://filamentphp.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev/)

## License

MIT License

## Contact

For support and queries, contact: info@primaryschool.local
