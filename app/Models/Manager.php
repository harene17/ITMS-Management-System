<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['managerName', 'managerId','status', 'email', 'contactNum'];

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class);
    }

    public function lead_devs(): BelongsToMany
    {
        return $this->belongsToMany(LeadDev::class);
    }
    public function projects(): BelongsToMany
    {
        return $this -> belongsToMany(Project::class);
    }
}
