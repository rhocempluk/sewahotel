@extends('admin/layout')

@section('content')
<h2>Data Reservasi</h2>
<table id="tabelreservasi" class="table" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pemesan</th>
        <th>Tipe Kamar</th>
        <th>Jumlah Kamar</th>
        <th>Tgl Chekin</th>
        <th>Tgl Checkout</th>
        <th>Total Bayar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
     @endphp
      @forelse ($reservasi as $rs)
        <tr>
          <td>{{ $i++ }}</td>
        <td>{{ $rs->id_user }}</td>
          <td>{{ $rs->id_kamar }}</td>
          <td>{{ $rs->jml_kamar }}</td>
          <td>{{ $rs->tgl_checkin }}</td>
          <td>{{ $rs->tgl_checkout }}</td>
          <td>{{ $rs->total_bayar }}</td>
          <td>
            <form action="{{ route('reservasi.destroy', $rs->id) }}" method="post">
              <a href="{{ route('reservasi.edit', $rs->id) }}" 
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
          <td class="text-center text-mute" colspan="8">Data reservasi tidak tersedia</td>
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
      
        var table = $('#tabelreservasi').DataTable();
        
    });
  
   });
  </script>
@endpush