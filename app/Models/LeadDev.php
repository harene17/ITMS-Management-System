<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadDev extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['leadName', 'leadId','status', 'email', 'contactNum', 'manager_id'];

    public function managers(): BelongsTo
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
