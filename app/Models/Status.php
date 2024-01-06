<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['project_id','ProgressDate','status','description'];

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
