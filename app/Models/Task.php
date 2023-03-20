<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
