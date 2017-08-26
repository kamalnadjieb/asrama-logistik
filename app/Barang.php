<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public function setValues($array){
        $this->nama = $array['nama'];
        $this->satuan = $array['satuan'];
        $this->stok = $array['stok'];
    }
}
