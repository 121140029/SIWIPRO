<!-- Tombol Edit -->
<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEditProduk{{ $item->id }}">
    Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditProduk{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.produk.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content" style="background-color: #19292A">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Edit Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body text-white" style="background-color: #19292A">
                    <div class="form-group">
                        <label>Judul Produk</label>
                        <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Produk</label>
                        <input type="number" name="jumlah_produk" class="form-control" value="{{ $item->jumlah_produk }}" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $item->harga }}" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control">{{ $item->keterangan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        @if($item->gambar)
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" width="80" class="mb-2"><br>
                        @endif
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-light">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
