<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $guarded = [
        'id',
    ];

    use HasFactory;

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function personal()
    {
        return $this->hasOne(Personal::class);
    }
    
    public function professional()
    {
        return $this->hasMany(Professional::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function organisation()
    {
        return $this->hasMany(Organisation::class);
    }
    public function other()
    {
        return $this->hasMany(Other::class);
    }
}
