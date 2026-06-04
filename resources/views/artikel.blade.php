@extends('template.app2')

@section('content')
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .premium-blog-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            padding: 60px 0 80px 0;
            color: #1e293b;
        }

        .section-header {
            margin-bottom: 48px;
            text-align: center;
        }

        .section-badge {
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

        .section-title {
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 16px;
        }

        .section-divider {
            width: 60px;
            height: 4px;
            background: #0383ef;
            border-radius: 2px;
            margin: 0 auto;
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 32px;
        }

        .article-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .article-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -15px rgba(3, 131, 239, 0.12), 0 1px 3px rgba(0, 0, 0, 0.02);
            border-color: rgba(3, 131, 239, 0.2);
        }

        .article-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            background: #f1f5f9;
            overflow: hidden;
        }

        .article-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .article-card:hover .article-img {
            transform: scale(1.05);
        }

        .article-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .article-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.4;
            margin-bottom: 12px;
            transition: color 0.2s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 56px; /* fallback / limit height */
        }

        .article-card:hover .article-title {
            color: #0383ef;
        }

        .article-excerpt {
            font-size: 15px;
            line-height: 1.6;
            color: #64748b;
            margin-bottom: 20px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-footer {
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .article-btn {
            display: inline-flex;
            align-items: center;
            color: #0383ef;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .article-btn i {
            margin-left: 6px;
            transition: transform 0.2s ease;
        }

        .article-btn:hover {
            color: #026ebd;
            text-decoration: none;
        }

        .article-btn:hover i {
            transform: translateX(4px);
        }

        @media (max-width: 768px) {
            .premium-blog-wrapper {
                padding: 40px 0;
            }
            .article-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .section-title {
                font-size: 28px;
            }
        }
    </style>

    <div class="premium-blog-wrapper">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Pusat Informasi</span>
                <h2 class="section-title">Artikel Kesehatan & Game</h2>
                <div class="section-divider"></div>
            </div>

            <div class="article-grid">
                @foreach ($artikel as $row)
                    <div class="article-card">
                        <div class="article-img-wrapper">
                            <img class="article-img" src="{{ Storage::url($row->gambar) }}" alt="Gambar Artikel">
                        </div>
                        <div class="article-body">
                            <h3 class="article-title" title="{{ $row->judul }}">
                                {{ $row->judul }}
                            </h3>
                            <div class="article-excerpt">
                                {!! Str::words(strip_tags($row->isi), 20) !!}
                            </div>
                            <div class="article-footer">
                                <a href="{{ route('artikel_pengunjung.detail', $row->id) }}" class="article-btn">
                                    Baca Selengkapnya <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
