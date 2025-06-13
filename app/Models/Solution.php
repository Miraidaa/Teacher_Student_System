<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = ['task_id', 'user_id', 'content', 'evaluated_at'];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
