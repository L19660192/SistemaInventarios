<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Adminlte_image()
    {
        return 'https://up.yimg.com/ib/th?id=OIP.srNFFzORAaERcWvhwgPzVAHaHa&pid=Api&rs=1&c=1&qlt=95&w=122&h=122/300/300';
    }
    public function adminlte_desc()
    {
        return 'I\'m a nice guy';
    }

    public function adminlte_profile_url()
    {
        return route('users.edit', ['id' => $this->id]);
    }



}




