<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahTentang">Tambah</button>

<div class="modal fade" id="modalTambahTentang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.tentang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content fw-bold" style="background: #19292A;">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tentang Kami</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="color: white; font-weight: bold;">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
