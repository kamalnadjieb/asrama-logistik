<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Proyek;
use App\Barang;
use App\Asrama;
use App\TipePengubahan;

class ProyekController extends Controller
{
    private $projectsPerPage = 10;

    public function showAll(Request $req){
        return $this->show($req,1);
    }

    public function show(Request $req, $page){
        $arrayParams = Array();
        $query = Proyek::with(['items','asrama'])->where('status',1);
        if($req->has('key')){
            $key = $req->input('key');
            $arrayParams['key'] = $key;
            $query->where(function($query) use($key){
                $query->where('nama','ilike','%'.$key.'%')
                    ->orWhere('deskripsi','ilike','%'.$key.'%');
            });
        }
        if($req->has('asrama')){
            $asrama = $req->input('asrama');
            $arrayParams['asrama'] = $asrama;
            $query->where('id_asrama','=',$asrama);
        }
        if($req->has('from')){
            $from = $req->input('from');
            $arrayParams['from'] = $from;
            $query->whereDate('tanggal_mulai','>=',$from);
        }
        if($req->has('to')){
            $to = $req->input('to');
            $arrayParams['to'] = $to;
            $query->whereDate('tanggal_mulai','<=',$to);
        }
        if($req->has('useitem')){
            $useItem = $req->input('useitem');
            $arrayParams['useitem'] = $useItem;
            $query->whereHas('items', function ($query) use($useItem){
                $query->where('barang.id',$useItem);
            });
        }
        $query->orderBy('tanggal_mulai','desc');

        $query->getRelation('asrama');

        $prefixUrl = '?'.http_build_query($arrayParams);

        $totalPages = ceil($query->count()/$this->projectsPerPage);
        $projects = $query->skip(($page-1)*$this->projectsPerPage)->take($this->projectsPerPage)->get();

        $pageUrl = '/logistik/proyek/page/';

        $dorms = Asrama::all();
        return \View::make('project.projects', compact("projects","page","totalPages","pageUrl","prefixUrl", "dorms"));
    }

    private function getTotalPages(){
        $total = Proyek::all()->count();
        $totalPage = $total/$this->projectsPerPage;
        return ceil($totalPage);
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

    public function editForm($id)
    {
        $project = Proyek::find($id);
        $items = $project->items;
        $tipepengubahan = TipePengubahan::all();
        return \View::make('project.editProject', compact("project","items","tipepengubahan"));
    }

    //location should be logistik/barang/tambah
    public function addProject(Request $req)
    {
        $querySuccessMessage = "<script>alert('proyek berhasil ditambahkan');window.location = '" . URL::to('logistik/proyek') . "';</script>";
        $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '" . URL::to('logistik/proyek/tambah') . "';</script>";
        try {
            $project = new Proyek();
            $project->setValues($req->all());
            $project->id_user = 1; //dummy
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
    
    public function deleteProject($id)
    {
        $project = Proyek::find($id);
        $project->delete();
        
        echo "Record deleted successfully.<br/>";
        echo '<a href="../">Click Here</a> to go back.';
    }
    
    public function closeProject($id)
    {
        $project = Proyek::find($id);
        Proyek::where('id', $id)->update(array('status'  => 0));
        
        echo "Proyek berhasil di tutup.<br/>";
        echo '<a href="../">Click Here</a> to go back.';
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
