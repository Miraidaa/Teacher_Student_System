<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'teacher_id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->belongsToMany(User::class, 'subject_student', 'subject_id', 'student_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    

}
