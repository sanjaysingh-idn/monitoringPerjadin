<?php

namespace App\Models;

use App\Models\Perjadin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bukti extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function perjadin()
    {
        return $this->belongsTo(Perjadin::class);
    }
}
