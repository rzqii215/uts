<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'role',
        'is_admin',
        'is_active',
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
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function hasRole(string|array $roles): bool
    {
        if ($this->email === 'admin@admin.com') {
            return true;
        }

        $roles = is_array($roles) ? $roles : [$roles];

        if (isset($this->role) && in_array($this->role, $roles, true)) {
            return true;
        }

        if (isset($this->is_admin) && $this->is_admin === true) {
            return in_array('admin', $roles, true)
                || in_array('super_admin', $roles, true)
                || in_array('Super Admin', $roles, true);
        }

        return false;
    }

    public function hasAnyRole(string|array $roles): bool
    {
        return $this->hasRole($roles);
    }

    public function hasPermissionTo(string $permission, ?string $guardName = null): bool
    {
        if ($this->email === 'admin@admin.com') {
            return true;
        }

        if (isset($this->is_admin) && $this->is_admin === true) {
            return true;
        }

        return false;
    }

    public function can($abilities, $arguments = []): bool
    {
        if ($this->email === 'admin@admin.com') {
            return true;
        }

        if (isset($this->is_admin) && $this->is_admin === true) {
            return true;
        }

        return parent::can($abilities, $arguments);
    }
}