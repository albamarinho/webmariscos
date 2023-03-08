<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marisco extends Model
{
    use HasFactory;

    //Updated at podría indicar nun marisco hai canto foi modificado o prezo ou a cantidade
    protected $table = 'mariscos';
    protected $fillable = ['tipo', 'cantidade', 'custo_unitario', 'fotografia'];

    protected $dates = ['created_at', 'updated_at'];
}
