<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Proyek;
use App\Barang;
use App\Asrama;

class ProyekController extends Controller
{
    private $projectsPerPage = 10;

	public function showAll(Request $req){
        return $this->show($req,1);
	}

	public function show(Request $req, $page){
	    if ($req->has('key')){
	        return $this->search($req->input('key'),1);
        }
	    $projects = Proyek::orderBy('tanggal_mulai','desc')->skip(($page-1)*$this->projectsPerPage)
            ->take($this->projectsPerPage)->get();
	    $totalPages = $this->getTotalPages();
	    $pageUrl = '/logistik/proyek/page/';
        return \View::make('project.projects', compact("projects","page","totalPages","pageUrl"));
    }

    public function search($key,$page){
	    $projects = Proyek::where('nama','ilike','%'.$key.'%')
            ->orWhere('deskripsi','ilike','%'.$key.'%')->skip(($page-1)*$this->projectsPerPage)
            ->take($this->projectsPerPage)->orderBy('tanggal_mulai','desc')->get();
	    $totalPages = Proyek::where('nama','ilike','%'.$key.'%')
            ->orWhere('deskripsi','ilike','%'.$key.'%')->count()/$this->projectsPerPage;
	    $pageUrl = '/logistik/proyek/search/'.$key.'/';
        return \View::make('project.projects', compact("projects","page","totalPages","pageUrl"));
    }

    private function getTotalPages(){
        $total = Proyek::all()->count();
        $totalPage = $total/$this->projectsPerPage;
        return $totalPage;
    }

	public function showProyekById($id) {
		$project = Proyek::find($id);
		$items = $project->items;
		return \View::make('project.projectDetails', compact("project","items"));
	}

    public function addForm()
    {
        $daftarbarang = Barang::orderBy('nama')->get();
        $daftarasrama = Asrama::orderBy('nama')->get();
        return \View::make('project.addProject', compact("daftarbarang", "daftarasrama"));
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
								$jumlah = $req->input('jumlah');
                $sync_data = [];
								for ($i = 0; $i < count($items); $i++) {
									$sync_data[$items[$i]] = ['jumlah' => $jumlah[$i]];
								}
                /*
								foreach ($items as $item){
                    $sync_data[$item] = ['jumlah' => $jumlah];
                }
								*/
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
