<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Usuario extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = ['nombre', 'email', 'pass', 'id_tipo_usuario'];


    public function tickets(){
        return $this->hasMany('App\Models\Ticket', 'id_usuario');
    }

    public function tipo_usuario(){
        return $this->belongsTo('App\Models\TipoUsuario', 'id_tipo_usuario');
    }

    public function getAuthPassword(){
        return $this->pass;
    }

    public function isAdmin(){
        return $this->id_tipo_usuario === 1;
    }
}
