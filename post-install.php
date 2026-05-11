/**
 * Post Installation Script
 * Run this file after installation to set up the system
 */

echo "Primary School CMS - Post Installation Setup\n";
echo "============================================\n\n";

// Check PHP version
if (version_compare(PHP_VERSION, '8.2.0', '<')) {
    echo "ERROR: PHP 8.2+ required\n";
    exit(1);
}

// Check for required extensions
$required_extensions = ['pdo', 'json', 'mbstring', 'openssl', 'tokenizer', 'xml'];
$missing = [];

foreach ($required_extensions as $ext) {
    if (!extension_loaded($ext)) {
        $missing[] = $ext;
    }
}

if (!empty($missing)) {
    echo "ERROR: Missing PHP extensions: " . implode(', ', $missing) . "\n";
    exit(1);
}

// Check directories
$dirs = [
    'storage/app',
    'storage/logs',
    'bootstrap/cache'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    
    if (!is_writable($dir)) {
        chmod($dir, 0755);
    }
}

echo "✓ All requirements met\n";
echo "✓ Required directories created\n";
echo "✓ File permissions set\n\n";

echo "Next steps:\n";
echo "1. php artisan migrate\n";
echo "2. php artisan db:seed\n";
echo "3. php artisan storage:link\n";
echo "4. php artisan serve\n\n";
echo "Visit http://localhost:8000 to access the site\n";
echo "Visit http://localhost:8000/admin to access the admin panel\n";
