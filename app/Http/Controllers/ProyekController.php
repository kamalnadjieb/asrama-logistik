<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;

class ProyekController extends Controller
{
  public function showAll(){
    $projects = Proyek::orderBy('tanggal_mulai')->get();
    return \View::make('projects', compact("projects"));
  }
}
