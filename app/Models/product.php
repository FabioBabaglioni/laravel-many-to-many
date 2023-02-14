<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'number',
        'weight',
    ]; 

    public function categories(){
        return $this -> belongsToMany(category :: class);
    }

    public function typology(){
        return $this -> belongsTo(typology :: class);
    }
}
