<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $casts = [
        'last_login' => 'datetime'
    ];

    public function isActive()
    {
        $name = Browser::browserName();
        $type = Browser::deviceType();
        $os = Browser::platformName();
        return $this->name = $name && $this->os = $os && $this->type = $type;
    }
}
