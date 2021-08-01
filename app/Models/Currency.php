<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    use HasFactory;

    public function users()
    {
        return $this->hasMany(Users::class);
    }
}
