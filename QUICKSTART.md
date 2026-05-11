# Quick Start Guide

## 5-Minute Setup

### Step 1: Install Dependencies
```bash
composer install
npm install
```

### Step 2: Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```
DB_DATABASE=primary_school_cms
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Setup Database
```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### Step 4: Build Assets
```bash
npm run build
```

### Step 5: Run Server
```bash
php artisan serve
```

## Access Points

| Page | URL | Credentials |
|------|-----|-------------|
| Website | http://localhost:8000 | Public |
| Admin Panel | http://localhost:8000/admin | admin@school.local / password |
| Blog | http://localhost:8000/blog | Public |
| Gallery | http://localhost:8000/gallery | Public |
| Admissions | http://localhost:8000/admissions | Public form |
| Contact | http://localhost:8000/contact | Public form |

## First Steps in Admin Panel

1. **Change Passwords**
   - Login to admin panel
   - Go to Users
   - Edit admin and editor users
   - Change passwords

2. **Update School Info**
   - Go to Settings (if available)
   - Update school name, email, phone, address
   - Add logo and favicon

3. **Create Homepage Content**
   - Go to Pages
   - Create "About" and "Academics" pages
   - Publish them

4. **Add Blog Posts**
   - Go to Posts
   - Create blog posts
   - Assign categories
   - Publish when ready

5. **Create Galleries**
   - Go to Galleries
   - Create photo galleries
   - Upload images
   - Publish

## Development Commands

```bash
# Useful commands during development

# Watch CSS changes
npm run dev

# Rebuild assets
npm run build

# Access database shell
php artisan tinker

# View database
php artisan db:table users

# Clear all caches
php artisan optimize:clear

# Run tests
php artisan test

# View routes
php artisan route:list
```

## File Structure Quick Reference

```
Key files to customize:

resources/views/website/            # Public website templates
├── home.blade.php                 # Homepage
├── layout.blade.php                # Main layout
├── components/
│   ├── navigation.blade.php        # Navigation bar
│   └── footer.blade.php            # Footer

resources/css/app.css               # Main styles
resources/js/app.js                 # Main JavaScript

app/Http/Controllers/Web/           # Website controllers
app/Filament/Resources/             # Admin panel

config/                             # Configuration files
database/seeders/                   # Demo data
```

## Customization Guide

### Change School Name
1. Edit `.env` - APP_NAME
2. Or edit in database via Settings

### Change Colors
1. Edit `tailwind.config.js`
2. Update color definitions
3. Run `npm run build`

### Add New Menu Item
1. Edit `resources/views/website/components/navigation.blade.php`
2. Add route link

### Create New Admin Section
1. Create Model
2. Create Migration
3. Create FilamentPHP Resource
4. Register in Filament

## Common Issues

### Database Connection Failed
- Check MySQL is running
- Verify `.env` credentials
- Run: `php artisan db:table users`

### Permission Denied Errors
```bash
chmod -R 775 storage bootstrap/cache
php artisan storage:link
```

### Missing Assets
```bash
npm install
npm run build
php artisan optimize:clear
```

### Need Help?
- Check DEVELOPMENT.md for detailed guide
- Check INSTALLATION.html for setup help
- Review code comments in app files

## Next Steps

1. ✅ Install and setup (done)
2. Change default passwords
3. Update school information
4. Create pages and content
5. Add gallery photos
6. Setup email for contact forms
7. Configure backups
8. Deploy to server

Happy building! 🎓
