<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $appends = [
        'created'
    ];

    protected $fillable = [
        'from',
        'to',
        'content',
    ];

    public function getCreatedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
