<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Redirect;
use App\Barang;

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $items = Barang::orderBy('nama')->get();
      return view('item.items', compact("items"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('item.addItem');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    // $querySuccessMessage = "<script>alert('barang berhasil ditambahkan');window.location = '".URL::to('logistik/barang')."';</script>";
    // $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang/tambah')."';</script>";
    // try{
      $item = new Barang();
      $data = $request->all();
      $item->nama = $data['nama'];
      $item->satuan = $data['satuan'];
      $item->stok = $data['stok'];
      $inserted = $item->save();
      if ($inserted)
        // echo $querySuccessMessage;
        return redirect('logistik/barang');
      else {
        // echo $queryFailMessage;
      }
    // } catch (QueryException $e) {
    //   echo $queryFailMessage;
    // }
    return redirect('logistik/barang');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   *
   * @return Response
   */
  public function show($id)
  {
      $item = Barang::find($id);
      return view('item.showItem', compact('item'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return Response
   */
  public function edit($id)
  {
      $item = Barang::find($id);
      return view('item.updateItem', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   *
   * @return Response
   */
  public function update($id, Request $request)
  {
    //   $querySuccessMessage = "<script>alert('barang berhasil diperbarui');window.location = '".URL::to('logistik/barang')."';</script>";
    // $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang/update')."';</script>";
    // try{
      $data = $request->all();
      $item = Barang::where('id', $id)->first();
      $item->nama = $data['nama'];
      $item->satuan = $data['satuan'];
      $item->stok = $data['stok'];
      $updated = $item->save();
      if ($updated)
        return redirect('logistik/barang');
        // echo $querySuccessMessage;
      else {
        // echo $queryFailMessage;
      }
    // } catch (QueryException $e) {
    //   echo $queryFailMessage;
    // }

      return redirect('logistik/barang');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return Response
   */
  public function destroy($id)
  {
       $querySuccessMessage = "<script>alert('barang berhasil dihapus');window.location = '".URL::to('logistik/barang') ."';</script>";
    $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang')."';</script>";
    try{
      $item = Barang::where('id', $id)->first();
      $deleted = $item->delete();
      if ($deleted)
        echo $querySuccessMessage;
      else {
        echo $queryFailMessage;
      }
    } catch (QueryException $e) {
      echo $queryFailMessage;
    }

      return redirect('logistik/barang');
  }


  // public function showAll(){
  //   $items = Barang::orderBy('nama')->get();
  //   return \View::make('items', compact("items"));
  // }

  // public function addForm(){
  //   return \View::make('addItem');
  // }

  // //location should be logistik/barang/tambah
  // public function addItem(Request $req){
  //   $querySuccessMessage = "<script>alert('barang berhasil ditambahkan');window.location = '".URL::to('logistik/barang')."';</script>";
  //   $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang/tambah')."';</script>";
  //   try{
  //     $item = new Barang();
  //     $item->nama = $req->input('nama');
  //     $item->satuan = $req->input('satuan');
  //     $item->stok = $req->input('stok');
  //     $inserted = $item->save();
  //     if ($inserted)
  //       echo $querySuccessMessage;
  //     else {
  //       echo $queryFailMessage;
  //     }
  //   } catch (QueryException $e) {
  //     echo $queryFailMessage;
  //   }
  // }

  // public function updateForm($id){
  //   $item = Barang::find($id);
  //   dd($item);
  //   return \View::make('updateItem', ['item' => $item['attributes']]);
  // }

  // public function updateItem(Request $req) {
  //   $querySuccessMessage = "<script>alert('barang berhasil diperbarui');window.location = '".URL::to('logistik/barang')."';</script>";
  //   $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang/update')."';</script>";
  //   try{
  //     $item = Barang::where('id', $req->input('id'))->first();
  //     $item->nama = $req->input('nama');
  //     $item->satuan = $req->input('satuan');
  //     $item->stok = $req->input('stok');
  //     $updated = $item->save();
  //     if ($updated)
  //       echo $querySuccessMessage;
  //     else {
  //       echo $queryFailMessage;
  //     }
  //   } catch (QueryException $e) {
  //     echo $queryFailMessage;
  //   }
  // }

  // public function deleteItem() {
  //   $querySuccessMessage = "<script>alert('barang berhasil dihapus');window.location = '".URL::to('logistik/barang')."';</script>";
  //   $queryFailMessage = "<script>alert('terjadi kesalahan');window.location = '".URL::to('logistik/barang')."';</script>";
  //   try{
  //     $item = Barang::where('id', $req->input('id'))->first();
  //     $deleted = $item->delete();
  //     if ($deleted)
  //       echo $querySuccessMessage;
  //     else {
  //       echo $queryFailMessage;
  //     }
  //   } catch (QueryException $e) {
  //     echo $queryFailMessage;
  //   }
  // }
}
