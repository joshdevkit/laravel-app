<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskList extends Model
{
    use HasFactory;
    protected $table = 'task_lists';
    protected $fillable = [
        'project_id',
        'member_id',
        'task_name',
        'description',
        'percentage',
    ];

    public function taskfor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }
}
