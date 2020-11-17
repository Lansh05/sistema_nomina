<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';
    public $timestamps=false;
 
    /**
     * @var array
     */
    protected $fillable = ['fecha','descripcion'];
}
