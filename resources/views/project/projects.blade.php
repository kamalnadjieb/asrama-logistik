@extends('base')

@section('title')
  proyek
@stop

@section('content')
  <form method="get" action="{{URL::to('/logistik/proyek/page/1')}}">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" class="form-control" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" id="key" name="key" placeholder="search" required>
      </div>
    </div>
  </form>

  <div class="space"></div>

  <table class="table table-hover">
      <tr>
          <th>Nama</th>
          <th>Lokasi</th>
          <th>Mulai</th>
          <th>Asrama</th>
      </tr>
      @foreach($projects as $project)
        <tr>
          <td>
            <a href="{{ URL::to('/logistik/proyek/'.$project->id)}}">{{$project->nama}}</a>
          </td>
          <td>{{$project->lokasi}}</td>
          <td>{{$project->tanggal_mulai}}</td>
          <td>{{$project->asrama->nama}}</td>
         </tr>
      @endforeach
  </table>

  <div class="form-group row">
      <div class="col-xs-1">
          @if($page>1)
              <button type="button" class="btn btn-default"
                      onclick="window.location='{{URL::to($pageUrl.($page-1).$prefixUrl)}}'">prev</button>
          @else
              <button type="button" class="btn btn-default disabled">prev</button>
          @endif
      </div>

      <div class="col-xs-1">
          <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
          @for($i=1;$i<=$totalPages;$i++)
              @if($i==$page)
                  <option value="{{URL::to($pageUrl.$i.$prefixUrl)}}" selected>{{$i}}</option>
              @else
                <option value="{{URL::to($pageUrl.$i.$prefixUrl)}}">{{$i}}</option>
              @endif
          @endfor
          </select>
      </div>

      <div class="col-xs-1">
          @if($page<$totalPages)
              <button type="button" class="btn btn-default"
                      onclick="window.location='{{URL::to($pageUrl.($page+1).$prefixUrl)}}'">next</button>
          @else
              <button type="button" class="btn btn-default disabled">next</button>
          @endif
      </div>
  </div>
@stop
