@extends('template.app2')

@section('content')
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .premium-about-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            padding: 80px 0;
            color: #1e293b;
        }

        .about-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            overflow: hidden;
            padding: 48px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -15px rgba(3, 131, 239, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .about-image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.1);
            background: #f1f5f9;
            aspect-ratio: 4/5;
        }

        .about-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .about-image-wrapper:hover .about-image {
            transform: scale(1.04);
        }

        .about-badge {
            display: inline-block;
            background: rgba(3, 131, 239, 0.08);
            color: #0383ef;
            font-weight: 600;
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 100px;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .about-title {
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 24px;
            line-height: 1.2;
            position: relative;
        }

        .about-title::after {
            content: '';
            display: block;
            width: 40px;
            height: 4px;
            background: #0383ef;
            border-radius: 2px;
            margin-top: 12px;
        }

        .about-content {
            font-size: 16px;
            line-height: 1.8;
            color: #475569;
        }

        .about-content p {
            margin-bottom: 16px;
        }

        .about-content strong {
            color: #0f172a;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .premium-about-wrapper {
                padding: 40px 0;
            }
            .about-card {
                padding: 24px;
                border-radius: 16px;
            }
            .about-title {
                font-size: 28px;
                margin-top: 24px;
            }
            .about-image-wrapper {
                aspect-ratio: 1;
            }
        }
    </style>

    <div class="premium-about-wrapper">
        <div class="container">
            <div class="about-card">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="about-image-wrapper">
                            <img class="about-image" src="{{ Storage::url($profil->foto) }}" alt="Profil Image">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="detail-box">
                            <span class="about-badge">Profil Aplikasi</span>
                            <h2 class="about-title">
                                Tentang
                            </h2>
                            <div class="about-content">
                                {!! $profil->profil !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
