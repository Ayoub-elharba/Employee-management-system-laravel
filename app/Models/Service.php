<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'id', 'titre', 'division_id'
    ];
    public function employe()
    {
        return $this->hasMany(Employe::class);
    }
}
