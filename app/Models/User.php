<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function developer()
    {
        return $this->hasOne(Developer::class);
    }
    public function LeadDev()
    {
        return $this->hasOne(LeadDev::class);
    }
    public function leadDevProjects()
    {
        return $this->hasManyThrough(
            Project::class,
            LeadDev::class,
            'user_id', // Foreign key on leadDevs table
            'leadDev_id', // Foreign key on projects table
            'id', // Local key on users table
            'id' // Local key on leadDevs table
        );
    }

    public function DeveloperProjects()
    {
        return $this->belongsToMany(Project::class, 'developer_project', 'developer_id', 'project_id');
    }
}
