<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahProduk">
    Tambah
</button>

<div class="modal fade" id="modalTambahProduk" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="background-color: #19292A">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Tambah Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body text-white" style="background-color: #19292A">
                    <div class="form-group">
                        <label>Judul Produk</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul produk" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Produk</label>
                        <input type="number" name="jumlah_produk" class="form-control" placeholder="Masukkan jumlah produk" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga produk" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan keterangan (opsional)"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer" style="background-color: #19292A">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
