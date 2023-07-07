<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeCurrency extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
}
