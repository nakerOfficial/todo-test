<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksModel extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'status', 'is_blocked'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_blocked', false);
    }

    public function scopeOrderby($query)
    {
        return $query->orderBy('id', 'DESC');
    }
}
