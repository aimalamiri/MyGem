<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_type_id',
        'instructor_id',
        'date_time',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }
}
