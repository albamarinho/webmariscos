<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $fillable = ['user_id', 'tipo_marisco', 'cantidade', 'prezo'];
    protected $dates = ['created_at', 'updated_at'];
}
