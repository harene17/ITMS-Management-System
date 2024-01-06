<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['projId', 'projName',	'owner', 'PIC',	'StartDate', 'EndDate'
                        , 'Duration', 'Methodology','Platform','Deployment','manager_id'
                        ,'leadDev_id'];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class,'manager_id');
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(Developer::class, 'developer_project');
    }

    public function leadDev(): BelongsTo
    {
        return $this->belongsTo(LeadDev::class,'leadDev_id');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'project_id');
    }
}
