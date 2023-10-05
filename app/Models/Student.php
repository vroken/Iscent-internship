<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'roll',
        'blood_group',
        'religion',
        'email',
        'class',
        'section',
        'admission_id',
        'phone_number',
        'upload',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
