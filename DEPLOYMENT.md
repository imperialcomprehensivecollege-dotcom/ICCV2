# Deployment Guide

## Pre-Deployment Checklist

### Security
- [ ] Change `APP_DEBUG=false` in `.env`
- [ ] Set `APP_ENV=production`
- [ ] Generate new `APP_KEY`: `php artisan key:generate`
- [ ] Update `APP_URL` to your domain
- [ ] Configure HTTPS/SSL certificate
- [ ] Set strong passwords
- [ ] Review and update CORS settings
- [ ] Check password hashing algorithm

### Database
- [ ] Create production database
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed initial data if needed
- [ ] Test backup strategy
- [ ] Enable backups

### Files & Storage
- [ ] Configure storage disk (local, S3, etc)
- [ ] Set proper file permissions (775 for dirs, 644 for files)
- [ ] Link storage directory: `php artisan storage:link`
- [ ] Configure file upload limits

### Environment
- [ ] Set up mail service (SMTP, SendGrid, etc)
- [ ] Configure queue driver
- [ ] Set up caching (Redis, Memcached)
- [ ] Configure session storage
- [ ] Test error logging

### Performance
- [ ] Run `php artisan optimize`
- [ ] Enable HTTP caching headers
- [ ] Configure CDN if needed
- [ ] Enable gzip compression
- [ ] Optimize images
- [ ] Minify CSS/JS

### Monitoring & Logging
- [ ] Configure error tracking (Sentry, etc)
- [ ] Set up monitoring
- [ ] Configure log aggregation
- [ ] Test error notifications
- [ ] Monitor disk space

## Deployment Steps

### On Your Server

1. **Clone Repository**
   ```bash
   git clone https://github.com/yourrepo/primary-school-cms.git
   cd primary-school-cms
   ```

2. **Install Dependencies**
   ```bash
   composer install --no-dev
   npm install
   npm run build
   ```

3. **Configure Environment**
   ```bash
   cp .env.example .env
   # Edit .env with production values
   php artisan key:generate
   ```

4. **Setup Database**
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

5. **Storage & Permissions**
   ```bash
   php artisan storage:link
   chmod -R 775 storage bootstrap/cache
   chown -R www-data:www-data storage bootstrap/cache public
   ```

6. **Optimize Application**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan optimize
   ```

7. **Enable Cron Jobs**
   Add to crontab:
   ```
   * * * * * cd /path/to/app && php artisan schedule:run >> /dev/null 2>&1
   ```

8. **Configure Web Server**

   **Nginx:**
   ```nginx
   server {
       listen 80;
       server_name primaryschool.local;
       root /path/to/app/public;

       index index.php index.html;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }

       location ~ /\.ht {
           deny all;
       }
   }
   ```

   **Apache:**
   ```apache
   <VirtualHost *:80>
       ServerName primaryschool.local
       DocumentRoot /path/to/app/public

       <Directory /path/to/app/public>
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

## SSL/HTTPS Setup

Use Let's Encrypt for free SSL:

```bash
sudo certbot certonly --webroot -w /path/to/app/public -d primaryschool.local
# Set up auto-renewal
```

## Backup Strategy

### Database Backups
```bash
mysqldump -u username -p database_name > backup.sql
```

### File Backups
```bash
tar -czf backup.tar.gz /path/to/app
```

### Automated Backups
Set up cron job:
```bash
0 2 * * * /path/to/backup-script.sh
```

## Monitoring

### Check Application Health
```bash
php artisan tinker
App\Models\User::count()  # Should return > 0
```

### Monitor Logs
```bash
tail -f storage/logs/laravel.log
```

### Check Disk Space
```bash
df -h
du -sh /path/to/app
```

## Troubleshooting

### 500 Error
- Check logs: `tail storage/logs/laravel.log`
- Verify permissions: `php artisan storage:link`
- Clear cache: `php artisan optimize:clear`

### Database Connection
```bash
php artisan db:table users
```

### Mail Not Sending
- Verify SMTP settings in `.env`
- Check mail logs
- Test with: `php artisan tinker` > `Mail::raw('Test', fn($m) => $m->to('email@test.com'))`

### Performance Issues
- Check database queries: Enable query logging
- Monitor RAM usage
- Check slow query log
- Clear cache and optimize

## Post-Deployment

### Create Admin User
```bash
php artisan tinker
App\Models\User::factory()->create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('secure-password')
])->assignRole('super-admin')
```

### Test Features
- [ ] Homepage loads
- [ ] Admin login works
- [ ] Create a test post
- [ ] Test contact form
- [ ] Test admission form
- [ ] Check emails sent

### Update Cron Jobs
```bash
# Laravel scheduler runs migrations
0 * * * * cd /path/to/app && php artisan schedule:run
```

### Monitor & Maintain
- Daily: Check logs
- Weekly: Check disk space, test backups
- Monthly: Review performance, update packages
- Quarterly: Security audit

## Scaling

### For High Traffic

1. **Database Optimization**
   - Use read replicas
   - Implement query caching
   - Add database indexes

2. **Caching**
   - Use Redis for sessions
   - Cache frequently accessed data
   - Enable HTTP caching

3. **Load Balancing**
   - Use multiple app servers
   - Configure load balancer
   - Sticky sessions configuration

4. **CDN**
   - Serve static assets from CDN
   - Cache images and CSS/JS

## Support

For deployment issues:
- Check Laravel documentation
- Review error logs
- Contact hosting support
- Check FilamentPHP docs

---

**Estimated Deployment Time**: 30-60 minutes (first time)
**Estimated Downtime**: 5-10 minutes

For rollback procedure, maintain git repository and use `git revert` if needed.
