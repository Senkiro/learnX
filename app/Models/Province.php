<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'provinces';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function districts()
    {
        return $this->hasMany(District::class,'province_code','code');
    }

}
