<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'tb_departamento';
    protected $primaryKey = 'depa_codi'; 
    public $incrementing = false;  
}
