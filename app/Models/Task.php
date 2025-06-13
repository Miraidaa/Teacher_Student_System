<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Solution;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'points', 'subject_id'];
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }


}
