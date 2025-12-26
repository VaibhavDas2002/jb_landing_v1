<?php

// app/Models/Notification.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'home.notifications';

    protected $fillable = [
        'title',
        'message',
        'scheme_name',
        'type',
        'status',
        'meta',
        'notified_at'
    ];

    protected $casts = [
        'meta' => 'array',
        'notified_at' => 'datetime'
    ];
}
