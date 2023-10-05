<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function student() {
        return $this->hasMany(Student::class);
    }

    public function teacher() {
        return $this->hasMany(Teacher::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
