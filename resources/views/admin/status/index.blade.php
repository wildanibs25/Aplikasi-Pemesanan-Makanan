@extends('layouts.aplikasi_admin')
@section('title','Status')
@section('content')


<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="60px;">No </th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tb_menu as $s)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->nama_menu}}</td>
                        <td>@currency($s->harga_menu)</td>
                        <td>
                            <div class="form-check form-switch">
                                {{-- <form method="POST" id="i">
                                    @csrf --}}
                                    <select class=" btn btn-primary" name="status_menu" id="status_menu" onchange="editStatus('{{ $s->id_menu }}', this.value);">
                                        <option  value="Tersedia" @if($s->status_menu == 'Tersedia'){ {{ __('selected') }} }  @endif>On</option>
                                        <option value="Tidak tersedia" @if($s->status_menu == 'Tidak tersedia'){ {{ __('selected') }} }  @endif>Off</option>
                                    </select>
                                {{-- </form> --}}
                            </div>
                        </td>
                        <td>{{$s->time}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    function editStatus(id_menu, status){
      var data={
            'id_menu': id_menu,
            'status': status,
        }
        $.post(
          '{{ url("admin/status/update") }}',
            JSON.stringify(data),
            function(res){
            //   alert('oke')
            },
            "JSON",
        )
    }
</script>
@endsection
   
<input type="hidden" value="{{ $thisPage = "Status" }}">
