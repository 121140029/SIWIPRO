@extends('layouts.admin.app')

@section('title', 'Kelola Pesanan')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pesanan</h3>
                </div>

                @if (session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                <div class="card-body">
                    {{-- Filter Row --}}
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="filterTanggal">Tanggal</label>
                            <input type="date" id="filterTanggal" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="filterStatus">Status</label>
                            <select id="filterStatus" class="form-control">
                                <option value="">Semua</option>
                                <option value="diproses">Diproses</option>
                                <option value="diterima">Diterima</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button id="btnFilter" class="btn btn-primary mr-2">Filter</button>
                            <button id="btnReset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>No HP</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanans as $pesanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan->kode_pesanan }}</td>
                                <td>{{ $pesanan->nama }}</td>
                                <td>{{ $pesanan->email }}</td>
                                <td>{{ $pesanan->tanggal }}</td>
                                <td>{{ $pesanan->no_handphone }}</td>
                                <td>{{ $pesanan->nama_produk }}</td>
                                <td>Rp {{ number_format($pesanan->harga ?? 0, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    @if($pesanan->bukti_transfer)
                                        <a href="{{ asset($pesanan->bukti_transfer) }}" target="_blank">
                                            <img src="{{ asset($pesanan->bukti_transfer) }}" alt="Bukti" width="70" class="img-thumbnail">
                                        </a>
                                    @else
                                        <span class="text-muted">Belum ada</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($pesanan->status) }}</td>
                                <td>
                                    {{-- Tombol ubah status jadi Diterima --}}
                                    <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="diterima">
                                        <button type="submit" class="btn btn-{{ $pesanan->status == 'diterima' ? 'primary' : 'secondary' }} btn-sm mb-1">
                                            Diterima
                                        </button>
                                    </form>

                                    {{-- Tombol ubah status jadi Selesai --}}
                                    <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="btn btn-{{ $pesanan->status == 'selesai' ? 'primary' : 'secondary' }} btn-sm">
                                            Selesai
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>No HP</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>
@endsection

@section('script')
<!-- DataTables Export Requirements -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
  $(function () {
      let table = $("#example1").DataTable({
          responsive: true,
          lengthChange: true,
          autoWidth: false,
          dom: 'Bfrtip',
          buttons: [
              {
                  extend: 'excel',
                  exportOptions: { columns: ':visible:not(:last-child)' }
              },
              {
                  extend: 'pdf',
                  orientation: 'landscape',
                  pageSize: 'A4',
                  exportOptions: { columns: ':visible:not(:last-child)' }
              },
              {
                  extend: 'print',
                  exportOptions: { columns: ':visible:not(:last-child)' }
              }
          ]
      });

      $('#btnFilter').click(function () {
          let tanggal = $('#filterTanggal').val().toLowerCase();
          let status = $('#filterStatus').val().toLowerCase();

          table.rows().every(function () {
              let data = this.data();
              // Index kolom disesuaikan:
              // 4 = Tanggal, 9 = Status
              let rowTanggal = $('<div>').html(data[4]).text().toLowerCase();
              let rowStatus = $('<div>').html(data[9]).text().toLowerCase();

              let matchTanggal = !tanggal || rowTanggal === tanggal;
              let matchStatus = !status || rowStatus === status;

              if (matchTanggal && matchStatus) {
                  $(this.node()).show();
              } else {
                  $(this.node()).hide();
              }
          });
      });

      $('#btnReset').click(function () {
          $('#filterTanggal').val('');
          $('#filterStatus').val('');
          table.rows().every(function () {
              $(this.node()).show();
          });
      });

      table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
