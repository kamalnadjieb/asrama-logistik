<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Proyek;

class ProyekController extends Controller
{
  public function showAll(){
    $projects = Proyek::orderBy('tanggal_mulai')->get();
    return \View::make('projects', compact("projects"));
  }

  public function addForm(){
    return \View::make('addProject');
  }

  //location should be logistik/barang/tambah
  public function addProject(Request $req){
    $querySuccessMessage = "<script>alert('proyek berhasil ditambahkan');window.location = '".URL::to('logistik/proyek')."';</script>";
    $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/proyek/tambah')."';</script>";
    try{
      $project = new Proyek();
      $project->nama = $req->input('nama');
      $project->lokasi = $req->input('lokasi');
      $project->deskripsi = $req->input('deskripsi');
      $project->tanggal_mulai = $req->input('tanggal_mulai');
      $inserted = $project->save();
      if ($inserted)
        echo $querySuccessMessage;
      else {
        echo $queryFailMessage;
      }
    } catch (QueryException $e) {
      echo $queryFailMessage;
    }
  }
}
