<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
