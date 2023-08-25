<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $table = 'conges';
    protected $fillable = [
        'employID', 'droitConge', 'duree', 'dataDepart', 'created_at'
    ];
}
