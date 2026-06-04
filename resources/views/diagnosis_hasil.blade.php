@extends('template.app2')

@section('content')
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .premium-result-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            padding: 60px 0 80px 0;
            color: #1e293b;
        }

        .result-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .result-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 40px;
            margin-bottom: 32px;
        }

        .result-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .result-badge {
            display: inline-block;
            background: rgba(3, 131, 239, 0.08);
            color: #0383ef;
            font-weight: 600;
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 100px;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .result-title {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .info-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0383ef;
            font-size: 18px;
        }

        .info-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        /* Diagnosis Highlight Section */
        .diagnosis-highlight {
            background: rgba(3, 131, 239, 0.03);
            border: 1px solid rgba(3, 131, 239, 0.15);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 36px;
        }

        .diagnosis-level-title {
            font-size: 14px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .diagnosis-level-name {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 16px;
        }

        .diagnosis-cf-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ef4444;
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 100px;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2);
        }

        /* Symptoms list as pills */
        .symptoms-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .symptoms-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 36px;
        }

        .symptom-pill {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .symptom-pill i {
            color: #10b981;
        }

        /* CF Table/Bars */
        .cf-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .cf-bar-item {
            margin-bottom: 20px;
        }

        .cf-bar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .cf-bar-label {
            font-size: 14px;
            font-weight: 600;
            color: #475569;
        }

        .cf-bar-val {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .cf-track {
            height: 8px;
            background: #e2e8f0;
            border-radius: 100px;
            overflow: hidden;
        }

        .cf-fill {
            height: 100%;
            background: #0383ef;
            border-radius: 100px;
        }

        /* Solutions section */
        .solution-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 40px;
            margin-bottom: 36px;
        }

        .solution-header {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 14px;
        }

        .solution-header i {
            color: #10b981;
        }

        .solution-body {
            font-size: 15px;
            line-height: 1.8;
            color: #475569;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        /* Capsule Buttons */
        .action-buttons-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
        }

        .btn-premium {
            border-radius: 100px;
            font-weight: 700;
            padding: 12px 28px;
            font-size: 15px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            border: none;
        }

        .btn-premium-secondary {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #475569;
        }

        .btn-premium-secondary:hover {
            background: #f8fafc;
            color: #0f172a;
            border-color: #94a3b8;
            text-decoration: none;
        }

        .btn-premium-primary {
            background: #0383ef;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(3, 131, 239, 0.15);
        }

        .btn-premium-primary:hover {
            background: #026ebd;
            box-shadow: 0 6px 20px rgba(3, 131, 239, 0.25);
            text-decoration: none;
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .premium-result-wrapper {
                padding: 30px 0;
            }
            .result-card, .solution-card {
                padding: 24px;
                border-radius: 20px;
            }
            .result-title {
                font-size: 24px;
            }
            .info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .diagnosis-level-name {
                font-size: 22px;
            }
            .action-buttons-wrapper {
                flex-direction: column;
                width: 100%;
            }
            .btn-premium {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="premium-result-wrapper">
        <div class="container">
            <div class="result-container">

                <!-- Main Report Card -->
                <div class="result-card">
                    <div class="result-header">
                        <span class="result-badge">Laporan Diagnosa</span>
                        <h1 class="result-title">Hasil Skrining Pengguna</h1>
                    </div>

                    <!-- Info Grid -->
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon"><i class="fa fa-user"></i></div>
                            <div>
                                <div class="info-label">Nama Lengkap</div>
                                <div class="info-value">{{ $data_diri['nama'] }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fa fa-whatsapp"></i></div>
                            <div>
                                <div class="info-label">No. HP / WhatsApp</div>
                                <div class="info-value">{{ $data_diri['no_hp'] }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fa fa-venus-mars"></i></div>
                            <div>
                                <div class="info-label">Jenis Kelamin</div>
                                <div class="info-value">{{ $data_diri['jenis_kelamin'] }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                            <div>
                                <div class="info-label">Alamat</div>
                                <div class="info-value">{{ $data_diri['alamat'] }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Diagnosis Highlight -->
                    <div class="diagnosis-highlight">
                        <div class="diagnosis-level-title">Kesimpulan Skrining</div>
                        <div class="diagnosis-level-name">{{ $nama_kecanduan }}</div>
                        <div class="diagnosis-cf-badge">
                            <i class="fa fa-shield"></i> Tingkat Keyakinan: {{ $nilai_cf > 0 ? $nilai_cf . '%' : '0%' }}
                        </div>
                    </div>

                    <!-- Symptoms List -->
                    <div class="symptoms-title">
                        <i class="fa fa-clipboard-list text-primary"></i> Gejala Yang Anda Alami:
                    </div>
                    <div class="symptoms-flex">
                        @foreach ($gejala as $value)
                            <div class="symptom-pill">
                                <i class="fa fa-check-circle"></i> {{ $value }}
                            </div>
                        @endforeach
                    </div>

                    <!-- CF Results Section -->
                    <div class="cf-section-title">Hasil Perhitungan Certainty Factor (CF)</div>
                    @foreach ($hasil as $key => $value)
                        <div class="cf-bar-item">
                            <div class="cf-bar-header">
                                <span class="cf-bar-label">{{ $value['nama_kecanduan'] }}</span>
                                <span class="cf-bar-val">{{ $value['persentase'] > 0 ? $value['persentase'] . '%' : '0%' }}</span>
                            </div>
                            <div class="cf-track">
                                <div class="cf-fill" style="width: {{ $value['persentase'] > 0 ? $value['persentase'] : 0 }}%;"></div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Solution Card -->
                <div class="solution-card">
                    <div class="solution-header">
                        <i class="fa fa-info-circle"></i>
                        <span>Solusi & Penanganan Rekomendasi</span>
                    </div>
                    <div class="solution-body">
                        {!! $solusi !!}
                    </div>
                </div>

                <!-- Action Form -->
                <form method="post" action="{{ route('diagnosis.pdf') }}" target="_blank">
                    @csrf
                    {!! Form::hidden('hasil', serialize($hasil)) !!}
                    {!! Form::hidden('gejala', serialize($gejala)) !!}
                    {!! Form::hidden('nama_kecanduan', $nama_kecanduan) !!}
                    {!! Form::hidden('solusi', $solusi) !!}
                    {!! Form::hidden('nilai_cf', $nilai_cf) !!}
                    {!! Form::hidden('data_diri', serialize($data_diri)) !!}

                    <div class="action-buttons-wrapper">
                        <a href="{{ route('diagnosis') }}" class="btn-premium btn-premium-secondary">
                            <i class="fa fa-check"></i> Selesai
                        </a>
                        <button type="submit" class="btn-premium btn-premium-primary">
                            <i class="fa fa-print"></i> Cetak Hasil Skrining
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
