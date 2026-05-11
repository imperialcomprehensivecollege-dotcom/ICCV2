<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed roles and permissions
        $this->call(RolePermissionSeeder::class);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@school.local'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('super-admin');

        // Create editor user
        $editor = User::firstOrCreate(
            ['email' => 'editor@school.local'],
            [
                'name' => 'Editor User',
                'password' => bcrypt('password'),
            ]
        );
        $editor->assignRole('editor');

        // Create categories
        $categories = [
            ['name' => 'News', 'slug' => 'news', 'description' => 'Latest school news and announcements'],
            ['name' => 'Events', 'slug' => 'events', 'description' => 'School events and activities'],
            ['name' => 'Achievements', 'slug' => 'achievements', 'description' => 'Student and school achievements'],
            ['name' => 'Updates', 'slug' => 'updates', 'description' => 'General updates'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }

        // Create sample posts
        $posts = [
            [
                'title' => 'Welcome to Our School',
                'slug' => 'welcome-to-our-school',
                'content' => '<p>Welcome to Primary School, where we build bright futures through quality education and dedicated teaching.</p>',
                'excerpt' => 'Welcome to our school community',
                'category_id' => 1,
                'author_id' => $admin->id,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'School Annual Sports Day',
                'slug' => 'school-annual-sports-day',
                'content' => '<p>Our annual sports day was a great success with students showcasing their athletic talents.</p>',
                'excerpt' => 'Annual sports day celebration',
                'category_id' => 2,
                'author_id' => $admin->id,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Science Fair 2024',
                'slug' => 'science-fair-2024',
                'content' => '<p>Our students displayed amazing scientific projects at the school science fair.</p>',
                'excerpt' => 'Students showcase innovation',
                'category_id' => 3,
                'author_id' => $editor->id,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(['slug' => $post['slug']], $post);
        }

        // Create pages
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h2>About Primary School</h2><p>Primary School is a leading educational institution committed to nurturing young minds and developing well-rounded individuals.</p>',
                'description' => 'Learn about our school and mission',
                'meta_title' => 'About Primary School',
                'meta_description' => 'Discover the story and mission of Primary School',
                'is_published' => true,
                'created_by' => $admin->id,
                'published_at' => now(),
            ],
            [
                'title' => 'Academics',
                'slug' => 'academics',
                'content' => '<h2>Our Academic Programs</h2><p>We offer comprehensive academic programs covering all major subjects with modern teaching methods.</p>',
                'description' => 'Our academic excellence program',
                'meta_title' => 'Academic Excellence - Primary School',
                'meta_description' => 'Explore our comprehensive academic programs',
                'is_published' => true,
                'created_by' => $admin->id,
                'published_at' => now(),
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(['slug' => $page['slug']], $page);
        }

        // Create settings
        $settings = [
            ['key' => 'school_name', 'value' => 'Primary School'],
            ['key' => 'school_email', 'value' => 'info@school.local'],
            ['key' => 'school_phone', 'value' => '+1 (555) 123-4567'],
            ['key' => 'school_address', 'value' => '123 Education Street, City, State'],
            ['key' => 'homepage_hero_title', 'value' => 'Welcome to Our School'],
            ['key' => 'homepage_hero_subtitle', 'value' => 'Building Bright Futures'],
            ['key' => 'social_links', 'value' => json_encode([
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ])],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
