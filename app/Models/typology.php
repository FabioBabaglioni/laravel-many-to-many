<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typology extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'digital',
    ];

    public function products(){
        return $this -> hasMany(product :: class);
    }
}
