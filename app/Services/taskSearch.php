<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class taskSearch
{

    public function search($search, $status)
    {
        $query = Task::query()->where('user_id', '=', Auth::id());
        if(!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%");
        }
        if($status != null) {
            $query->where('status', '=', $status);
        }
        $tasks = $query->orderBy('created_at', 'desc')->paginate(5);
        return $tasks;
    }
}
