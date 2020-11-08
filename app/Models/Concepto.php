<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;

    protected $table = 'conceptos';
    public $timestamps=false;
 
    /**
     * @var array
     */
    protected $fillable = ['descripcion'];
}
