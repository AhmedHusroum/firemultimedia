<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;


class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_ADMIN = 'Admin';
    public const ROLE_USER = 'User';
    public const ROLE_FINANCE = 'Finance';
    public const ROLE_SALES = 'Sales';
    public const ROLE_MAINTENANCE = 'Maintenance';
    public const ROLE_INVENTORY = 'Inventory';
    public const ROLE_CUSTOMER = 'Customer';
    public const ROLE_HMAINTENANCE = 'Headmaintenance';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function notes()
    {
        return $this->hasMany(Note::class, 'author_id');
    }    
    


    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function tickets()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function authoredNotes()
    {
        return $this->hasMany(Note::class, 'author_id');
    }


    public function lease_contracts()
    {
        return $this->hasMany(LeaseContract::class, 'customer_id');
    }

    public function malfunction_requests()
    {
        return $this->hasMany(MalfunctionRequest::class, 'customer_id');
    }

    public function work_orders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
