<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function checklist_group(): BelongsTo
    {
        return $this->belongsTo(ChecklistGroup::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
