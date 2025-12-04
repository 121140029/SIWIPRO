@extends('layouts.admin.app')

@section('title', 'Kelola Tentang Kami')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelola Tentang Kami</h3>
                    <div class="d-flex justify-content-end mb-3">
                        @include('admin.tentang.create')
                    </div>
                </div>
                @if (session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%">No</th>
                                <th style="width: 55%">Keterangan</th>
                                <th style="width: 20%">Gambar</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tentangs as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-wrap text-break w-50">
                                    {{ Str::limit($item->keterangan, 500) }}
                                </td>
                                <td class="text-center">
                                    @if($item->gambar)
                                        <img src="{{ asset($item->gambar) }}" class="img-fluid rounded" style="max-width: 100px;">
                                    @else
                                        <small>Gambar tidak tersedia</small>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        @include('admin.tentang.edit')
                                        @include('admin.tentang.delete')
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
  $(function() {
      $("#example1").DataTable({
          "responsive": true,
          "lengthChange": true,
          "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
