<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function subjects() 
    {
        return $this->hasMany(Subject::class, 'teacher_id'); 
    }

    public function takenSubjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_user', 'user_id', 'subject_id'); 
    }
}
