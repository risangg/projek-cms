<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAdmin extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'mentor',
        'waktu',
        'training',
        'harga'
    ];
}
