<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'checklist_group_id', 'user_id', 'checklist_id'];

    public function checklist_group(): BelongsTo
    {
        return $this->belongsTo(ChecklistGroup::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    
    public function user_tasks(): HasMany
    {
        return $this->hasMany(Task::class)->where('user_id', auth()->id());
    }
}
