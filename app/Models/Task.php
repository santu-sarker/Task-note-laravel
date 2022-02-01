<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, Sluggable;

    protected $tableName = "tasks";
    protected $primaryKey = "task_id";

    protected $fillable = [
        'title',
        'description',
        'task_owner',
        'task_slug',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // generating slug here
    public function sluggable()
    {
        return [
            'task_slug' => [
                'source' => 'title',
            ],
        ];
    }
    // changing route model binding keyword  using slug as default key for route model binding
    public function getRouteKeyName()
    {
        return 'task_slug';
    }
}
