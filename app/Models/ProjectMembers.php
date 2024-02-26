<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectMembers extends Model
{
    use HasFactory;

    protected $table = 'project_members';
    protected $fillable = [
        'user_id',
        'project_id',
    ];


    public function members(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
