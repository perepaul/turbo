<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function (self $trade) {
            $trade->expires_at = Carbon::parse($trade->time)->toDateTimeString();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trade_currency()
    {
        return $this->belongsTo(TradeCurrency::class);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExpired(Builder $query)
    {
        return $query->whereDate('expires_at', '>=', now());
    }

    public function close()
    {
        $user = $this->user;
        $user->{'yes' == $this->is_demo ? 'demo_balance' : 'balance'} += $this->profit + $this->amount;
        $user->save();
        $this->status = 'inactive';
        $this->save();
        if ($this->profit == 0) {
            $this->addOrRemoveProfit();
        }
    }

    public function addOrRemoveProfit()
    {
        if (rand(0, 1)) {
            $this->profit += (200 / 100) * $this->amount;
        } else {
            $this->profit -= (35 / 100) * $this->amount;
        }
        $this->save();
    }

    // public function setTimeAttribute($value)
    // {
    //     return $this->attributes['time'] = Carbon::parse($value)->toDateTimeString();
    // }
}
