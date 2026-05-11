#!/bin/bash

# Primary School CMS - Setup Script
# This script automates the initial setup process

set -e

echo "================================"
echo "Primary School CMS - Setup"
echo "================================"
echo ""

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Check PHP
echo -e "${YELLOW}Checking PHP version...${NC}"
PHP_VERSION=$(php -r 'echo PHP_VERSION;')
echo "PHP Version: $PHP_VERSION"

# Check Composer
if ! command -v composer &> /dev/null; then
    echo -e "${RED}Composer not found. Please install Composer.${NC}"
    exit 1
fi
echo -e "${GREEN}✓ Composer found${NC}"

# Check Node.js
if ! command -v node &> /dev/null; then
    echo -e "${RED}Node.js not found. Please install Node.js.${NC}"
    exit 1
fi
echo -e "${GREEN}✓ Node.js found${NC}"

echo ""
echo -e "${YELLOW}Installing dependencies...${NC}"
composer install
npm install

echo ""
echo -e "${YELLOW}Setting up environment...${NC}"
if [ ! -f .env ]; then
    cp .env.example .env
    echo -e "${GREEN}✓ Created .env file${NC}"
else
    echo ".env already exists"
fi

echo ""
echo -e "${YELLOW}Generating application key...${NC}"
php artisan key:generate

echo ""
echo -e "${YELLOW}Building assets...${NC}"
npm run build

echo ""
echo -e "${YELLOW}Database setup...${NC}"
echo "Make sure your database is configured in .env"
read -p "Press enter to continue..."

php artisan migrate
php artisan db:seed

echo ""
echo -e "${YELLOW}Setting up storage...${NC}"
php artisan storage:link
chmod -R 775 storage bootstrap/cache

echo ""
echo -e "${GREEN}================================${NC}"
echo -e "${GREEN}Setup Complete!${NC}"
echo -e "${GREEN}================================${NC}"
echo ""
echo "Next steps:"
echo "1. Edit .env file with your settings"
echo "2. Run: php artisan serve"
echo "3. Visit: http://localhost:8000"
echo "4. Admin: http://localhost:8000/admin"
echo ""
echo "Default Credentials:"
echo "Email: admin@school.local"
echo "Password: password"
echo ""
