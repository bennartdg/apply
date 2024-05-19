<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cv()
    {
        return $this->belongsTo(CV::class);
    }
}
