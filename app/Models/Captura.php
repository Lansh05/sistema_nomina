<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Captura extends Model
{
    use HasFactory;

  

    protected $table = 'capturas';
    public $timestamps=false;
 
    /**
     * @var array
     */
    protected $fillable = ['fecha','empleado','nota','concepto'];
}
