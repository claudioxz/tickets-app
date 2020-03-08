<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = ['nombre', 'email', 'pass', 'id_tipo_usuario'];


    public function tickets(){
        return $this->hasMany('App\Models\Ticket', 'id_usuario');
    }

    public function tipo_usuario(){
        return $this->belongsTo('App\Models\TipoUsuario', 'id_tipo_usuario');
    }
}
