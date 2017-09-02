<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';

    public function setValues ($array) {
        $this->nama = $array['nama'];
        $this->lokasi = $array['lokasi'];
        $this->deskripsi = $array['deskripsi'];
        $this->tanggal_mulai = $array['tanggal_mulai'];
        
        echo "hoihoihoi";
        echo $array['id_asrama'];

        $this->id_asrama = $array['id_asrama'];
    }

    public function items()
    {
        return $this->belongsToMany('App\Barang', 'proyek_barang', 'id_proyek', 'id_barang')->withPivot('jumlah')->withTimestamps();
    }
}
