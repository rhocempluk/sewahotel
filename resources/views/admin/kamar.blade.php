@extends('admin/layout')

@section('content')
<h2>Data Kamar</h2>
  <p><a href="{{route('kamar.create')}}" class="btn btn-primary" role="button">+ Tambah Kamar</a></p>
<table id="tabelkamar" class="table" >
    <thead>
      <tr>
        <th>No</th>
        <th>Tipe Kamar</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
     @endphp
      @forelse ($kamars as $kmr)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $kmr->tipe_kamar }}</td>
          <td>{{ $kmr->jml_kamar}}</td>
          <td>{{ $kmr->harga}}</td>
          <td><img src="{{ url('image').('/').$kmr->gambar }}" class="rounded" 
            style="width: 150px; height: 90px"></td>
          <td class="text-center">
            <form action="{{ route('kamar.destroy', $kmr->id) }}" method="post">
              <a href="{{ route('kamar.edit', $kmr->id) }}" 
                class="btn btn-warning btn-sm">Edit</a>                      
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" 
              onclick="return confirm('yakin hapus data ?')">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td class="text-center text-mute" colspan="4">Data kamar tidak tersedia</td>
        </tr>
        @endforelse
    </tbody>
  </table>
@endsection

@push('scripts')
  <script>
   $(function () {
    $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });

    $(document).ready(function() {
      
        var table = $('#tabelkamar').DataTable();
        
    });
  
   });
  </script>
  @endpush