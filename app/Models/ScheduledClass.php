<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }

    public function scopeUpcoming(Builder $query)
    {
        return $query->where('date_time', '>', now());
    }

    public function scopeNotBooked(Builder $query)
    {
        return $query->whereDoesntHave('members', function ($query) {
            $query->where('user_id', auth()->id());
        });
    }
}
