<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'province_id',
        'district_id',
        'ward_id',
        'address',
        'birthday',
        'image',
        'description',
        'user_agent',
        'ip',
        'role_id',
        'publish',
        'verification_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function generateVerificationToken()
    {
        $this->verification_token = Str::random(32);
        $this->save();
    }

    public function sendEmailVerificationNotification()
    {
        $verificationUrl = route('verification.verify', ['token' => $this->verification_token]);
        Mail::send('backend.email.verify', ['url' => $verificationUrl], function ($message) {
            $message->to($this->email)
                ->subject('Verify Email Address');
        });
    }

    public function markEmailAsVerified()
    {
        $this->email_verified_at = now();
        $this->verification_token = null;
        $this->save();
    }
}

