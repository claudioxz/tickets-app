<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';
    public $timestamps = false;

    protected $fillable = ['nombre'];


    public function usuarios(){
        return $this->hasMany('App\Models\Usuario', 'id_tipo_usuario');
    }

}
