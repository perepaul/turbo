<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    private $minimumTradeAmount = 50;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function statusIs($value)
    {
        return $this->status == $value;
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function scopeAutoTradeable(Builder $builder)
    {
        return $this->where('trade_cert', 'verified')
            ->orWhereNull('trade_cert')
            ->where('balance', '>', $this->minimumTradeAmount)
            ->where('trade_mode', '!=', 'manual')
            ->where('status', 'active');
    }

    public function trade($currency_id, $amount, $type, $time)
    {
        return $this->trades()->create([
            'reference' => generateReference(),
            'trade_currency_id' => $currency_id,
            'amount' => $amount,
            'is_demo' => 'no',
            'profit' => 0,
            'type' => $type,
            'time' => $time,
        ]);
    }

    public function autoTrade()
    {
        $currency = TradeCurrency::inRandomOrder()->limit(1)->first();
        $maxTradeAmount = $this->invested_balance > 500 ? 700 : $this->invested_balance;
        $amount = rand($this->minimumTradeAmount, $this->maxTradeAmount);
        $types = ['buy', 'sell'];
        $type = $types[array_rand($types)];
        $time =  config('app.trade_time')[array_rand(config('app.trade_time'))];
        try {
            if (!is_null($this->trade($currency->id, (int) $amount, $type, $time))) {
                $this->balance -= $amount;
                $this->save();
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
