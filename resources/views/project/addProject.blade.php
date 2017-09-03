@extends('base')

@section('title')
    tambah proyek
@stop

@section('content')
    <form method="POST" action="{{URL::to('logistik/proyek/tambah/do')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="nama">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lokasi">Lokasi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="deskripsi">Deskripsi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="tanggal_mulai">Tanggal Mulai:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
            </div>
        </div>

        <div>
            <div name="group-asrama">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="namaasrama">Asrama:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="asrama" name="id_asrama" required>
                            <option value="" disabled selected>Nama Asrama</option>
                            @foreach ($daftarasrama as $asrama)
                                <option value="{{$asrama->id}}">{{$asrama->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="input_fields_wrap">
            <div name="group-barang">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="namabarang">Barang:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="barang" name="barang[]" required>
                            <option value="" disabled selected>Nama Barang</option>
                            @foreach ($daftarbarang as $barang)
                                <option value="{{$barang->id}}">{{$barang->nama}} Stok = {{$barang->stok}}</option>
                            @endforeach
                        </select>
                        <input id="jumlah" name="jumlah[]" type="number" placeholder="Jumlah barang"></input>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default add_field_button">Tambahkan Barang</button>
            </div>
        </div>

        <input type="submit" value="submit"/>
    </form>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(`
            <div name="group-barang">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="namabarang">Barang:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="barang" name="barang[]" required>
                            <option value="" disabled selected>Nama Barang</option>
                            @foreach ($daftarbarang as $barang)
                                <option value="{{$barang->id}}">{{$barang->nama}} Stok = {{$barang->stok}}</option>
                            @endforeach
                        </select>
                        <input id="jumlah" name="jumlah[]" type="number" placeholder="Jumlah barang"></input>
                    </div>
                </div>
                <a href="#" class="col-sm-offset-2 col-sm-10 remove_field">Remove</a><br/>
            </div>`); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@stop
