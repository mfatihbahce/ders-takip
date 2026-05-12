<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'student_surname',
        'identity_number',
        'birth_date',
        'gender',
        'student_phone',
        'grade_level',
        'address',
        'proximity_degree',
        'current_school',
        'health_issue',
        'parent_name',
        'parent_surname',
        'parent_phone',
        'parent_email',
        'parent_job',
        'emergency_name',
        'emergency_phone',
        'status',
    ];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(SchoolClass::class, 'application_class');
    }
}
