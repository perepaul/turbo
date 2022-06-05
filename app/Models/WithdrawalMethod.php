<?php

namespace App\Models;

use App\Models\Method;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawalMethod extends Model
{

    protected static function booted()
    {
        static::addGlobalScope('linked', function (Builder $builder) {
            $builder->where('unlinked', 0);
        });
    }
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'details' => 'json',
    ];

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
