<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
   use HasFactory;

   protected $table = 'empleados';
   public $timestamps=false;

   /**
    * @var array
    */
   protected $fillable = ['nombre','apellidpat','apellidomat','idpuesto','email','rfc','numtel','numempleado','horaentrada','horasalida'];
}
