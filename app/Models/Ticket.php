<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    public $timestamps = false;

    protected $fillable = ['ticket_pedido', 'id_usuario'];

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario');
    }
}
