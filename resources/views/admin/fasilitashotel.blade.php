@extends('admin/layout')

@section('content')
<h2>Data Fasilitas Hotel</h2>
  <p><a href="{{route('fasilitashotel.create')}}" 
    class="btn btn-primary" role="button">+ Tambah Fasilitas Hotel</a></p>
<table id="tabelfashos" class="table" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Fasilitas Hotel</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
     @endphp
      @forelse ($fashos as $fh)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $fh->nama_fasilitas }}</td>
          <td><img src="{{ url('image').('/').$fh->gambar }}" class="rounded" 
            style="width: 150px; height: 90px"></td>
          <td class="text-center">
            <form action="{{ route('fasilitashotel.destroy', $fh->id) }}" 
              method="post">
              <a href="{{ route('fasilitashotel.edit', $fh->id) }}" 
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
          <td class="text-center text-mute" colspan="4">Data fasilitas hotel tidak tersedia</td>
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
      
        var table = $('#tabelfashos').DataTable();
        
    });
  
   });
  </script>
  @endpush