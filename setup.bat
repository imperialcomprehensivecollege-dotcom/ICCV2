@echo off
REM Primary School CMS - Setup Script for Windows
REM This script automates the initial setup process

echo ================================
echo Primary School CMS - Setup
echo ================================
echo.

REM Check PHP
echo Checking PHP installation...
php -v >nul 2>&1
if %errorlevel% neq 0 (
    echo PHP not found. Please install PHP.
    exit /b 1
)
echo PHP found
echo.

REM Check Composer
echo Checking Composer installation...
composer -v >nul 2>&1
if %errorlevel% neq 0 (
    echo Composer not found. Please install Composer.
    exit /b 1
)
echo Composer found
echo.

REM Check Node.js
echo Checking Node.js installation...
node -v >nul 2>&1
if %errorlevel% neq 0 (
    echo Node.js not found. Please install Node.js.
    exit /b 1
)
echo Node.js found
echo.

REM Install dependencies
echo Installing dependencies...
call composer install
call npm install

REM Setup .env
echo.
echo Setting up environment...
if not exist .env (
    copy .env.example .env
    echo Created .env file
) else (
    echo .env already exists
)

REM Generate key
echo.
echo Generating application key...
php artisan key:generate

REM Build assets
echo.
echo Building assets...
call npm run build

REM Database setup
echo.
echo Database setup...
echo Make sure your database is configured in .env
pause

php artisan migrate
php artisan db:seed

REM Storage
echo.
echo Setting up storage...
php artisan storage:link

REM Summary
echo.
echo ================================
echo Setup Complete!
echo ================================
echo.
echo Next steps:
echo 1. Edit .env file with your settings
echo 2. Run: php artisan serve
echo 3. Visit: http://localhost:8000
echo 4. Admin: http://localhost:8000/admin
echo.
echo Default Credentials:
echo Email: admin@school.local
echo Password: password
echo.
pause
