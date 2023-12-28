<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\SubmitOrder;
use App\Models\Recommendation;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'profile_url', 'mobile_number', 'country', 'contact_preference',
        'getclout_services', 'order_timing', 'order_quantity', 'how_did_you_hear', 'zoom_call',
        'additional_notes', 'terms', 'user_type', 'is_approved', 'password',
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
        'password' => 'hashed',
    ];



    public function submitOrders()
    {
        return $this->hasMany(SubmitOrder::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
