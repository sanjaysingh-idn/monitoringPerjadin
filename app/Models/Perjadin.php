<?php

namespace App\Models;

use App\Models\Bukti;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perjadin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function buktis()
    {
        return $this->hasMany(Bukti::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
