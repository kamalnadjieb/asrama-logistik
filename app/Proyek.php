<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';

    public function items()
    {
        return $this->belongsToMany('App\Barang', 'proyek_barang', 'id_proyek', 'id_barang');
    }
}
