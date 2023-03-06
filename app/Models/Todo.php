<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todoes';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
