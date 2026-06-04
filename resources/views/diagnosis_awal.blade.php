@extends('template.app2')

@section('content')
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .premium-form-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            min-height: calc(100vh - 100px);
            padding: 60px 0;
            color: #1e293b;
        }

        .form-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 48px;
            max-width: 650px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .form-icon-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(3, 131, 239, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            color: #0383ef;
            font-size: 28px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 15px;
            color: #64748b;
            line-height: 1.5;
        }

        .form-group-label {
            font-size: 14px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }

        .form-control-premium {
            width: 100%;
            padding: 12px 18px;
            font-size: 15px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background-color: #ffffff;
            color: #1e293b;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            outline: none;
            height: auto;
        }

        .form-control-premium:focus {
            border-color: #0383ef;
            box-shadow: 0 0 0 4px rgba(3, 131, 239, 0.1);
            outline: none;
        }

        .form-control-premium.is-invalid {
            border-color: #ef4444;
        }

        .form-control-premium.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
        }

        .invalid-feedback-premium {
            font-size: 13px;
            color: #ef4444;
            margin-top: 6px;
            font-weight: 500;
        }

        .btn-submit-premium {
            background: #0383ef;
            color: #ffffff;
            border: none;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(3, 131, 239, 0.2);
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
        }

        .btn-submit-premium:hover {
            background: #026ebd;
            box-shadow: 0 6px 20px rgba(3, 131, 239, 0.3);
            transform: translateY(-1px);
            color: #ffffff;
            text-decoration: none;
        }

        .form-divider {
            border: 0;
            height: 1px;
            background: #f1f5f9;
            margin: 32px 0;
        }

        /* Glassmorphic Premium Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Inter', sans-serif;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            display: flex !important;
        }

        .loading-content {
            text-align: center;
            max-width: 400px;
            padding: 24px;
            width: 90%;
        }

        .loader-circle-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 30px auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid transparent;
            border-top-color: #0383ef;
            border-bottom-color: #00c6ff;
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
        }

        .loader-circle-inner {
            position: absolute;
            width: 80%;
            height: 80%;
            border: 3.5px solid transparent;
            border-left-color: #10b981;
            border-right-color: #f59e0b;
            border-radius: 50%;
            animation: spin-reverse 1.2s linear infinite;
        }

        .loader-icon {
            font-size: 40px;
            color: #fff;
            animation: pulse-icon 1.5s ease-in-out infinite;
            text-shadow: 0 0 15px rgba(3, 131, 239, 0.6);
        }

        .loading-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 12px;
            color: #ffffff;
        }

        .loading-bar-container {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 18px;
        }

        .loading-bar-fill {
            height: 100%;
            width: 0%;
            background: #0383ef;
            border-radius: 10px;
        }

        .loading-subtitle {
            font-size: 14px;
            color: #94a3b8;
            min-height: 22px;
            font-weight: 500;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes spin-reverse {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }

        @keyframes pulse-icon {
            0%, 100% { transform: scale(1); opacity: 0.85; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        @media (max-width: 768px) {
            .premium-form-wrapper {
                padding: 30px 0;
            }
            .form-card {
                padding: 32px 24px;
                border-radius: 20px;
            }
            .form-title {
                font-size: 24px;
            }
        }
    </style>

    <div class="premium-form-wrapper">
        <div class="container">
            <div class="form-card">
                <div class="form-header">
                    <div class="form-icon-circle">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <h1 class="form-title">Registrasi Skrining</h1>
                    <p class="form-subtitle">Silakan isi data diri di bawah ini untuk memulai analisis kecanduan game online.</p>
                </div>

                <form action="{{ route('diagnosis.proses') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-group-label" for="nama">Nama Lengkap</label>
                                <input type="text" required class="form-control-premium @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso">
                                @error('nama')
                                    <div class="invalid-feedback-premium">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-group-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select required class="form-control-premium @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback-premium">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-group-label" for="no_hp">No. HP / WhatsApp</label>
                                <input type="tel" minlength="12" maxlength="13" required class="form-control-premium @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 081234567890">
                                @error('no_hp')
                                    <div class="invalid-feedback-premium">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-group-label" for="alamat">Alamat Tinggal</label>
                                <input type="text" required class="form-control-premium @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Contoh: Jl. Sudirman No. 12">
                                @error('alamat')
                                    <div class="invalid-feedback-premium">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="text-center">
                        <button type="submit" id="btnMulaiSkrining" name="btn_proses" class="btn-submit-premium">
                            Mulai Skrining <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Glassmorphic Premium Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay" style="display: none;">
        <div class="loading-content">
            <div class="loader-circle-wrapper">
                <div class="loader-circle"></div>
                <div class="loader-circle-inner"></div>
                <i class="fa fa-gamepad loader-icon"></i>
            </div>
            <h2 class="loading-title">Menyiapkan Skrining</h2>
            <div class="loading-bar-container">
                <div class="loading-bar-fill"></div>
            </div>
            <p class="loading-subtitle">Menganalisis data diri...</p>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var form = this;

                // Validate form first
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                // Show Loading Overlay with fade-in effect
                var $overlay = $('#loadingOverlay');
                $overlay.css('display', 'flex');
                setTimeout(function() {
                    $overlay.addClass('active');
                }, 10);

                // Animate progress bar fill smoothly
                $('.loading-bar-fill').animate({
                    width: '100%'
                }, 2400, 'linear');

                // Dynamic loading text subtitles
                var subtitles = [
                    "Menganalisis data diri...",
                    "Menyiapkan instrumen skrining...",
                    "Menginisialisasi model diagnosis...",
                    "Hampir selesai, selamat datang!"
                ];
                var currentSub = 0;
                var interval = setInterval(function() {
                    if (currentSub < subtitles.length - 1) {
                        currentSub++;
                        $('.loading-subtitle').fadeOut(200, function() {
                            $(this).text(subtitles[currentSub]).fadeIn(200);
                        });
                    }
                }, 600);

                // Delay submission for a high-fidelity loading experience
                setTimeout(function() {
                    clearInterval(interval);
                    form.submit();
                }, 2500);
            });
        });
    </script>
@endsection
