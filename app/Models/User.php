<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'created_by');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'created_by');
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class, 'reviewed_by');
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function isEditor(): bool
    {
        return $this->hasRole('editor') || $this->isSuperAdmin();
    }
}
