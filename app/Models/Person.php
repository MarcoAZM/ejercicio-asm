<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $primaryKey = "dni";
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'dni',
        'name',
        'birthdate',
        'address',
        'phone'
    ];
}
