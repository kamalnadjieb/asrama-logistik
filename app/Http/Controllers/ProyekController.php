<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Proyek;
use App\Barang;

class ProyekController extends Controller
{
	public function showAll(){
		$projects = Proyek::orderBy('tanggal_mulai')->get();
		return \View::make('project.projects', compact("projects"));
	}

	public function showProyekById($id) {
		$project = Proyek::find($id);
		$items = $project->items;
		return \View::make('project.projectDetails', compact("project","items"));
	}

    public function addForm()
    {
        $daftarbarang = Barang::orderBy('nama')->get();
        return \View::make('project.addProject', compact("daftarbarang"));
    }

    //location should be logistik/barang/tambah
    public function addProject(Request $req)
    {
        $querySuccessMessage = "<script>alert('proyek berhasil ditambahkan');window.location = '" . URL::to('logistik/proyek') . "';</script>";
        $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '" . URL::to('logistik/proyek/tambah') . "';</script>";
        try {
            $project = new Proyek();
            $project->setValues($req->all());
            $inserted = $project->save();
            if ($inserted) {
                $items = $req->input('barang');
                $sync_data = [];
                foreach ($items as $item){
                    $sync_data[$item] = ['jumlah' => $item];
                }
                $project->items()->sync($sync_data);
                echo $querySuccessMessage;
            }
            else {
                echo $queryFailMessage;
            }
        } catch (QueryException $e) {
            echo $queryFailMessage;
        }
    }

    public function debug($id)
    {
        $items = Proyek::find($id)->items;
        foreach ($items as $item) {
            echo $item . "<br>";
        }
        return $id;
    }
}
