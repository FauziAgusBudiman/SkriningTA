@extends('template_backend.app')

@section('content')
    <style>
        /* --- CUSTOM MODERN STYLE UNTUK HALAMAN DETAIL --- */
        .page-header {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0;
        }
        .modern-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border-top: 4px solid #36b9cc; /* Aksen Cyan/Info */
        }
        .info-card {
            background-color: #f8f9fc;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            border: 1px solid #eaecf4;
        }
        .info-title {
            color: #36b9cc;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
            border-bottom: 2px solid #eaecf4;
            padding-bottom: 10px;
        }
        
        /* Tombol Modern */
        .btn-modern {
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            color: white;
        }
        .btn-back { background: #858796; color: white; }
        .btn-print { background: linear-gradient(135deg, #1cc88a 0%, #13a673 100%); color: white; }
        .btn-retest { background: linear-gradient(135deg, #f6c23e 0%, #d49f1c 100%); color: white; }

        /* Styling Tabel Info & Summary */
        .table-info-custom th {
            color: #5a5c69;
            font-weight: 600;
            border-top: none;
            padding-left: 0;
            width: 35%;
        }
        .table-info-custom td {
            color: #2c3e50;
            font-weight: 700;
            border-top: none;
        }
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        .table-custom thead th {
            background-color: #f8f9fc;
            color: #5a5c69;
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 700;
            border-bottom: 2px solid #e3e6f0;
            padding: 15px;
        }
        .table-custom tbody td {
            vertical-align: middle;
            color: #3a3b45;
            padding: 12px 15px;
            border-bottom: 1px solid #eaecf4;
        }

        /* Badge Custom */
        .badge-hasil {
            background-color: #e3f2fd;
            color: #0288d1;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
        }
        .badge-nilai {
            background-color: #ffebee;
            color: #d32f2f;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.95rem;
            display: inline-block;
            box-shadow: 0 2px 5px rgba(211, 47, 47, 0.1);
        }
        .gejala-item {
            background: white;
            padding: 5px 10px;
            border-radius: 6px;
            border: 1px solid #eaecf4;
            margin-bottom: 5px;
            display: block;
            font-size: 0.9rem;
            color: #4a5568;
        }
    </style>

    <section class="content-header mx-3 mt-3">
        <div class="container-fluid">
            <div class="row mb-3 align-items-center">
                <div class="col-sm-8">
                    <h1 class="page-header"><i class="fas fa-file-medical-alt mr-2" style="color: #36b9cc;"></i> Detail Data Hasil Skrining</h1>
                    <p class="text-muted mb-0">Informasi lengkap mengenai hasil skrining kecanduan game online.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content mx-3 mb-5">
        <!-- Tombol Aksi Atas -->
        <div class="mb-4 d-flex flex-wrap gap-2">
            <a href="{{ route('hasil.index') }}" class="btn btn-modern btn-back mr-2">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
            <a href="{{ route('hasil.cetak', $hasil->id) }}" target="_blank" class="btn btn-modern btn-print mr-2">
                <i class="fas fa-print mr-1"></i> Cetak Hasil
            </a>
            <a href="{{ route('hasil.edit', $hasil->id) }}" class="btn btn-modern btn-retest">
                <i class="fas fa-sync-alt mr-1"></i> Skrining Ulang
            </a>
        </div>

        <div class="card modern-card mb-4">
            <div class="card-body p-4">
                <div class="row">
                    <!-- Kolom Data Diri -->
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="info-card">
                            <h5 class="info-title"><i class="fas fa-user mr-2"></i> Data Konseli</h5>
                            <table class="table table-sm table-info-custom">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>{{ $hasil->nama }}</td>
                                </tr>
                                <tr>
                                    <th>No HP / WhatsApp</th>
                                    <td>{{ $hasil->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $hasil->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td>{{ $hasil->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Skrinning</th>
                                    <td>{{ $hasil->created_at->format('d-m-Y H:i') }} WIB</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Kolom Hasil Diagnosa -->
                    <div class="col-md-6">
                        <div class="info-card" style="background-color: #fff; border-color: #36b9cc;">
                            <h5 class="info-title" style="border-bottom-color: #36b9cc;"><i class="fas fa-stethoscope mr-2"></i> Kesimpulan Skrining</h5>
                            <table class="table table-sm table-info-custom">
                                <tr>
                                    <th class="align-top">Hasil Skrining</th>
                                    <td>
                                        <span class="badge-hasil">{{ $hasil->kecanduan->nama_kecanduan ?? 'Tidak diketahui' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-top">Tingkat Keyakinan</th>
                                    <td>
                                        <span class="badge-nilai">{{ $hasil->cf > 0 ? $hasil->cf . '%' : '0%' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-top pt-3">Gejala Dialami</th>
                                    <td class="pt-3">
                                        @foreach (unserialize($hasil->gejala) as $value)
                                            <span class="gejala-item"><i class="fas fa-check text-success mr-2"></i> {{ $value }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kolom Solusi Penanganan -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="info-card" style="background-color: #f0f9fa; border-left: 4px solid #36b9cc;">
                            <h5 class="info-title text-dark"><i class="fas fa-lightbulb text-warning mr-2"></i> Solusi & Penanganan</h5>
                            <div class="p-2" style="white-space: pre-wrap; word-wrap: break-word; color: #2c3e50; line-height: 1.6;">{!! $hasil->kecanduan->solusi ?? 'Belum ada solusi yang ditambahkan untuk diagnosa ini.' !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Summary / Aksi Tambahan -->
        <div class="card modern-card" style="border-top-color: #e3e6f0;">
            <div class="card-body p-4">
                <h5 class="font-weight-bold text-gray-800 mb-3"><i class="fas fa-list mr-2"></i> Ringkasan Aksi</h5>
                <div class="table-responsive">
                    <table class="table table-custom" id="datatable" data-ordering="false">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th>Nama Konseli</th>
                                <th>Hasil Skrining</th>
                                <th class="text-center">Nilai</th>
                                <th>Tanggal Skrining</th>
                                <th class="text-center" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="font-weight-bold">{{ $hasil->nama }}</td>
                                <td><span class="badge-hasil">{{ $hasil->kecanduan->nama_kecanduan ?? 'Tidak diketahui' }}</span></td>
                                <td class="text-center"><span class="badge-nilai">{{ $hasil->cf > 0 ? $hasil->cf . '%' : '0%' }}</span></td>
                                <td>{{ $hasil->created_at->format('d-m-Y H:i') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('hasil.destroy', $hasil->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-modern delete-confirm" type="submit" title="Hapus Riwayat Ini">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').on('click', '.delete-confirm', function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                        title: "Konfirmasi Hapus",
                        text: "Anda yakin ingin menghapus data hasil diagnosa ini? Data yang dihapus tidak dapat dikembalikan.",
                        icon: "warning",
                        buttons: ["Batal", "Ya, Hapus!"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        });

        @if (session()->has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
            }
            toastr.success('{{ session('success') }}');
        @elseif (session()->has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
            }
            toastr.error('{{ session('error') }}');
        @endif
    </script>
@endsection