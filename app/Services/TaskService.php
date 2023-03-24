<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public static function searchTask($search, $status)
    {
      $user_id = Auth::id();
      $query = Task::query()->where('user_id', '=', $user_id)->orderBy('created_at', 'desc');
      if(!empty($search)) {
          $query->where('title', 'LIKE', "%{$search}%")
          ->orWhere('body', 'LIKE', "%{$search}%");
      }
      if($status != null) {
          $query->where('status', '=', $status);
      }
      return $tasks = $query->paginate(5);
    }
}
