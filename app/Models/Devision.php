<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devision extends Model
{
    use HasFactory;
    protected $table = 'devisions';
    protected $fillable = [
        'id', 'nomD'
    ];
}
