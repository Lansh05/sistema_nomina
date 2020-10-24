<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puesto extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'puestos';
    public $timestamps=false;
 
    /**
     * @var array
     */
    protected $fillable = ['descripcion','salario','tipopago'];
}
