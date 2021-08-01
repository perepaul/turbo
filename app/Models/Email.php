<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'attachments' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasAttachment()
    {
        return count($this->attachments) ? "yes" : "no";
    }
}
