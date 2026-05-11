<?php

namespace App\Services;

use App\Models\Setting;

class SettingsService
{
    public static function getSetting(string $key, $default = null)
    {
        return Setting::getValue($key, $default);
    }

    public static function setSetting(string $key, $value): void
    {
        Setting::setValue($key, $value);
    }

    public static function getSchoolName(): string
    {
        return self::getSetting('school_name', 'Primary School');
    }

    public static function getSchoolEmail(): string
    {
        return self::getSetting('school_email', 'info@school.local');
    }

    public static function getSchoolPhone(): string
    {
        return self::getSetting('school_phone', '');
    }

    public static function getSchoolAddress(): string
    {
        return self::getSetting('school_address', '');
    }

    public static function getSchoolLogo(): ?string
    {
        return self::getSetting('school_logo');
    }

    public static function getSchoolFavicon(): ?string
    {
        return self::getSetting('school_favicon');
    }

    public static function getSocialLinks(): array
    {
        return json_decode(self::getSetting('social_links', '{}'), true) ?? [];
    }

    public static function getHomepageHeroTitle(): string
    {
        return self::getSetting('homepage_hero_title', 'Welcome to Our School');
    }

    public static function getHomepageHeroSubtitle(): string
    {
        return self::getSetting('homepage_hero_subtitle', 'Building Bright Futures');
    }

    public static function getHomepageHeroImage(): ?string
    {
        return self::getSetting('homepage_hero_image');
    }
}
