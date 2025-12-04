<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan - PT Tunas Jaya Lautan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <style>
      :root {
          --primary-color: #98FB98;
          --accent-color: #3CB371;
          --secondary-color: #f8f9fa;
          --text-color: #333;
          --light-text: #6c757d;
          --white: #ffffff;
          --shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
          --transition: all 0.3s ease;
      }

      body {
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          background-color: var(--secondary-color);
          color: var(--text-color);
          overflow-x: hidden;
          padding-top: 60px;
      }

      .hero-section {
          position: relative;
          height: 55vh;
          background: linear-gradient(rgba(144, 238, 144, 0.7), rgba(60, 179, 113, 0.8)),
          url('{{ asset('assets/img/bgimage.jpg') }}') center/cover no-repeat;
          display: flex;
          align-items: center;
          justify-content: center;
          color: var(--white);
          text-align: center;
      }

      .hero-content h1 {
          font-size: 3rem;
          font-weight: 700;
          text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
      }

      .main-content {
          position: relative;
          background: var(--white);
          margin-top: -70px;
          border-radius: 20px 20px 0 0;
          box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
          padding: 4rem 0;
      }

      .form-section {
          background-color: #fff;
          border-radius: 12px;
          box-shadow: var(--shadow);
          padding: 2rem;
          margin-bottom: 2rem;
      }

      .section-title {
          color: var(--accent-color);
          font-weight: 700;
          border-bottom: 2px solid #e9ecef;
          padding-bottom: 0.5rem;
          margin-bottom: 1.5rem;
      }

      .form-label {
          font-weight: 600;
          color: var(--accent-color);
      }

      .form-control, .form-select {
          border-radius: 10px;
          padding: 0.75rem;
      }

      .btn-primary {
          background: var(--accent-color);
          border: none;
          border-radius: 8px;
          padding: 0.75rem 1.5rem;
          font-weight: 600;
          transition: var(--transition);
      }

      .btn-primary:hover {
          background: #2e8b57;
          transform: translateY(-2px);
          box-shadow: 0 4px 15px rgba(60,179,113,0.3);
      }

      .btn-success {
          background: linear-gradient(135deg, #28a745 0%, #218838 100%);
          border: none;
          border-radius: 8px;
          padding: 0.75rem 1.5rem;
          font-weight: 600;
          transition: all 0.3s ease;
      }

      .btn-success:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 15px rgba(40,167,69,0.3);
      }

      .btn-outline-success, .btn-outline-danger {
          border-radius: 8px;
      }
  </style>
</head>

<body>
  @include('layouts.users.navbar')

  <!-- HERO -->
  <section class="hero-section">
      <div class="hero-content" data-aos="fade-up">
          <h1>Form Pemesanan Produk</h1>
          <p class="lead">Lengkapi data berikut untuk melakukan pemesanan produk kami.</p>
      </div>
  </section>

  <main class="main-content">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">

                  @if(session('sukses'))
                      <div class="alert alert-success alert-dismissible fade show">
                          <i class="fas fa-check-circle me-2"></i>{{ session('sukses') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>
                  @endif

                  @if($errors->any())
                      <div class="alert alert-danger">
                          <ul class="mb-0">
                              @foreach($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form action="{{ route('tamu.pesanan.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      {{-- Data Diri --}}
                      <div class="form-section">
                          <h5 class="section-title"><i class="fas fa-user-circle me-2"></i>Data Diri</h5>
                          <div class="mb-3">
                              <label class="form-label"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
                              <input type="text" name="nama" class="form-control" value="{{ old('nama', Auth::user()->name ?? '') }}" required>
                          </div>

                          <div class="row">
                              <div class="col-md-6 mb-3">
                                  <label class="form-label"><i class="fas fa-calendar me-1"></i> Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label class="form-label"><i class="fas fa-phone me-1"></i> No Handphone</label>
                                  <input type="text" name="no_handphone" class="form-control" value="{{ old('no_handphone') }}" required>
                              </div>
                          </div>

                          <div class="mb-3">
                              <label class="form-label"><i class="fas fa-envelope me-1"></i> Email</label>
                              <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email ?? '') }}" required>
                          </div>
                      </div>

                      {{-- Detail Produk (Multi Item) --}}
                      <div class="form-section">
                          <h5 class="section-title"><i class="fas fa-box-open me-2"></i>Detail Produk</h5>

                          <p class="text-muted small mb-3">
                              Anda dapat menambahkan lebih dari satu produk. Produk yang sudah dipilih tidak bisa dipilih lagi di baris lain.
                              Jika ingin menambah jumlah, ubah kolom <strong>Jumlah</strong> pada produk tersebut.
                          </p>

                          <div id="produkItems">
                              {{-- ROW PERTAMA TEMPLATE --}}
                              <div class="produk-item row g-2 align-items-end mb-3">
                                  <div class="col-md-5">
                                      <label class="form-label"><i class="fas fa-list me-1"></i> Pilih Produk</label>
                                      <select name="produk_items[0][produk_id]" class="form-select produk-select" required>
                                          <option value="">-- Pilih Produk --</option>
                                          @foreach($produk as $item)
                                              <option value="{{ $item->id }}"
                                                      data-judul="{{ $item->judul }}"
                                                      data-harga="{{ $item->harga }}">
                                                  {{ $item->judul }} — Rp{{ number_format($item->harga, 0, ',', '.') }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-2">
                                      <label class="form-label"><i class="fas fa-sort-numeric-up me-1"></i> Jumlah</label>
                                      <input type="number"
                                             name="produk_items[0][qty]"
                                             class="form-control qty-input"
                                             min="1"
                                             value="1"
                                             required>
                                  </div>
                                  <div class="col-md-3">
                                      <label class="form-label"><i class="fas fa-money-bill me-1"></i> Harga Satuan</label>
                                      <input type="text"
                                             class="form-control harga-display"
                                             placeholder="-"
                                             readonly>
                                  </div>
                                  <div class="col-md-2 text-end">
                                      <button type="button"
                                              class="btn btn-outline-danger btn-sm btn-remove-produk d-none">
                                          <i class="fas fa-trash-alt"></i>
                                      </button>
                                  </div>
                              </div>
                          </div>

                          <button type="button" id="addProdukItem" class="btn btn-outline-success btn-sm">
                              <i class="fas fa-plus-circle me-1"></i> Tambah Produk
                          </button>

                          {{-- TOTAL HARGA --}}
                          <div class="mt-4 text-end">
                              <h6 class="mb-1">Total Harga</h6>
                              <div id="totalHargaText" class="fs-5 fw-bold text-success">Rp 0</div>
                          </div>
                      </div>

                      {{-- Pembayaran --}}
                      <div class="form-section">
                          <h5 class="section-title"><i class="fas fa-credit-card me-2"></i>Pembayaran</h5>
                          <div class="mb-3">
                              <label class="form-label"><i class="fas fa-file-invoice me-1"></i> Upload Bukti Transfer</label>
                              <input type="file" name="bukti_transfer" class="form-control" accept="image/*">
                              <small class="text-muted">Format: JPG, PNG, Max 2MB</small>
                          </div>
                      </div>

                      <div class="d-grid gap-2">
                          <button type="button" class="btn btn-primary py-3" data-bs-toggle="modal" data-bs-target="#paymentModal">
                              <i class="fas fa-wallet me-2"></i> Informasi Pembayaran
                          </button>
                          <button type="submit" class="btn btn-success py-3">
                              <i class="fas fa-paper-plane me-2"></i> Kirim Pesanan
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </main>

  <!-- Modal Pembayaran -->
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 shadow">
              <div class="modal-header" style="background: var(--accent-color); color: #fff;">
                  <h5 class="modal-title"><i class="fas fa-money-bill-wave me-2"></i> Informasi Pembayaran</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body p-4">
                  <div class="text-center mb-4">
                      <div class="bg-light p-3 rounded-circle d-inline-block mb-3">
                          <i class="fas fa-wallet text-success" style="font-size: 3rem;"></i>
                      </div>
                      <h4 style="color: var(--accent-color);">Silakan Transfer Pembayaran</h4>
                  </div>

                  <div class="card border-success mb-3">
                      <div class="card-body text-center">
                          <h5 class="card-title fw-bold text-success">bca</h5>
                          <h6 class="text-muted">PT Tunas Jaya Lautan</h6>
                          <p class="fs-4 fw-bold text-dark">0767788889</p>
                      </div>
                  </div>

                  <div class="alert alert-info d-flex align-items-center">
                      <i class="fas fa-info-circle me-2 fs-5"></i>
                      <div>
                          Setelah melakukan pembayaran, jangan lupa untuk mengupload bukti transfer pada form di atas.
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
          </div>
      </div>
  </div>

  @include('layouts.users.footer')

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const produkContainer = document.getElementById('produkItems');
          const addProdukBtn = document.getElementById('addProdukItem');
          const firstRow = produkContainer.querySelector('.produk-item');
          let rowIndex = 1;

          const maxProducts = firstRow.querySelector('.produk-select').options.length - 1; // minus placeholder

          function calculateTotal() {
              let total = 0;

              document.querySelectorAll('.produk-item').forEach(row => {
                  const select = row.querySelector('.produk-select');
                  const qtyInput = row.querySelector('.qty-input');

                  if (!select || !qtyInput) return;
                  if (!select.value) return;

                  const optionSelected = select.options[select.selectedIndex];
                  const harga = parseFloat(optionSelected.getAttribute('data-harga') || '0');
                  const qty = parseInt(qtyInput.value || '0');

                  total += harga * qty;
              });

              const totalEl = document.getElementById('totalHargaText');
              if (totalEl) {
                  totalEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total || 0);
              }
          }

          function updateDisabledOptions() {
              const selects = Array.from(document.querySelectorAll('.produk-select'));
              const selectedValues = selects
                  .map(s => s.value)
                  .filter(v => v !== '');

              selects.forEach(select => {
                  const currentVal = select.value;
                  Array.from(select.options).forEach(opt => {
                      if (!opt.value) return; // skip placeholder
                      if (opt.value === currentVal) {
                          opt.disabled = false;
                      } else if (selectedValues.includes(opt.value)) {
                          opt.disabled = true;
                      } else {
                          opt.disabled = false;
                      }
                  });
              });

              calculateTotal();
          }

          function attachEventsToRow(row) {
              const select = row.querySelector('.produk-select');
              const hargaDisplay = row.querySelector('.harga-display');
              const qtyInput = row.querySelector('.qty-input');

              if (select) {
                  select.addEventListener('change', function () {
                      const optionSelected = this.options[this.selectedIndex];
                      const harga = optionSelected.getAttribute('data-harga') || '';

                      if (hargaDisplay) {
                          hargaDisplay.value = harga
                              ? new Intl.NumberFormat('id-ID').format(harga)
                              : '-';
                      }

                      updateDisabledOptions();
                  });
              }

              if (qtyInput) {
                  qtyInput.addEventListener('input', function () {
                      calculateTotal();
                  });
              }
          }

          // Attach for first row
          attachEventsToRow(firstRow);

          // Handle tambah produk
          addProdukBtn.addEventListener('click', function () {
              const currentSelected = Array.from(document.querySelectorAll('.produk-select'))
                  .map(s => s.value)
                  .filter(v => v !== '').length;

              if (currentSelected >= maxProducts) {
                  alert('Semua produk sudah dipilih. Ubah jumlah jika ingin menambah.');
                  return;
              }

              const newRow = firstRow.cloneNode(true);

              // update name attribute index
              newRow.querySelectorAll('select, input').forEach(el => {
                  if (el.name && el.name.includes('produk_items')) {
                      el.name = el.name.replace(/\[\d+\]/, '[' + rowIndex + ']');
                  }
              });

              // reset values
              const select = newRow.querySelector('.produk-select');
              const qtyInput = newRow.querySelector('.qty-input');
              const hargaDisplay = newRow.querySelector('.harga-display');
              const removeBtn = newRow.querySelector('.btn-remove-produk');

              if (select) select.value = '';
              if (qtyInput) qtyInput.value = 1;
              if (hargaDisplay) hargaDisplay.value = '-';
              if (removeBtn) removeBtn.classList.remove('d-none');

              produkContainer.appendChild(newRow);
              attachEventsToRow(newRow);
              updateDisabledOptions();

              rowIndex++;
          });

          // Handle hapus baris produk (event delegation)
          produkContainer.addEventListener('click', function (e) {
              const btn = e.target.closest('.btn-remove-produk');
              if (!btn) return;

              const rows = produkContainer.querySelectorAll('.produk-item');
              if (rows.length <= 1) {
                  alert('Minimal harus ada satu produk.');
                  return;
              }

              const row = btn.closest('.produk-item');
              if (row) {
                  row.remove();
                  updateDisabledOptions();
              }
          });
      });
  </script>
</body>
</html>
