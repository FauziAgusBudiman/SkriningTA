@extends('template.app2')

@section('content')
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS styling for Premium Slideshow & Timeline -->
    <style>
        .screening-wrapper {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f8fafc;
            min-height: calc(100vh - 100px);
            padding: 50px 0;
            color: #1e293b;
        }

        .screening-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 40px;
        }

        /* Progress Bar Styling */
        .progress-container {
            background: #ffffff;
            padding: 0 0 24px 0;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 30px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .progress-title {
            font-size: 15px;
            font-weight: 600;
            color: #475569;
        }

        .progress-percentage {
            font-size: 14px;
            font-weight: 700;
            color: #0383ef;
            background: rgba(3, 131, 239, 0.08);
            padding: 4px 12px;
            border-radius: 100px;
        }

        .progress-bar-bg {
            height: 8px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-fill {
            height: 100%;
            width: 0%;
            background: #0383ef;
            border-radius: 10px;
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Question Slides Styling */
        .slides-deck {
            position: relative;
            min-height: 480px;
            background: #ffffff;
        }

        .screening-slide {
            display: none;
            opacity: 0;
            transform: translateY(15px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .screening-slide.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .question-code-badge {
            background: rgba(3, 131, 239, 0.08);
            color: #0383ef;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 100px;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid rgba(3, 131, 239, 0.15);
        }

        .question-title-text {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.4;
            letter-spacing: -0.5px;
            margin-top: 12px;
            margin-bottom: 25px;
        }

        /* Illustration and Image Frame */
        .illustration-frame {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 20px;
            height: 100%;
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .illustration-frame:hover {
            border-color: rgba(3, 131, 239, 0.3);
            background: rgba(3, 131, 239, 0.01);
        }

        .illustration-img {
            max-height: 260px;
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .illustration-img:hover {
            transform: scale(1.02);
        }

        .illustration-placeholder-icon {
            font-size: 56px;
            color: #94a3b8;
            animation: float-icon 3s ease-in-out infinite;
        }

        /* Timeline Labels */
        .options-list-label {
            font-size: 14px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        /* Vertical Interactive Timeline Layout */
        .timeline-wrapper {
            position: relative;
            padding: 10px 0;
            max-width: 480px;
            margin: 0 auto;
        }

        .timeline-line-path {
            position: absolute;
            top: 25px;
            bottom: 25px;
            left: 50%;
            width: 2px;
            background: #e2e8f0;
            transform: translateX(-50%);
            z-index: 1;
            border-radius: 2px;
        }

        .timeline-row {
            display: flex;
            align-items: center;
            position: relative;
            margin-bottom: 18px;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .timeline-row:last-child {
            margin-bottom: 0;
        }

        /* Staggered Pop Up Entrance Animation for Timeline Rows */
        @keyframes popUpRow {
            0% {
                opacity: 0;
                transform: translateY(10px) scale(0.98);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .screening-slide.active .timeline-row {
            animation: popUpRow 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
            opacity: 0;
        }

        .screening-slide.active .timeline-row:nth-child(2) { animation-delay: 0.05s; }
        .screening-slide.active .timeline-row:nth-child(3) { animation-delay: 0.10s; }
        .screening-slide.active .timeline-row:nth-child(4) { animation-delay: 0.15s; }
        .screening-slide.active .timeline-row:nth-child(5) { animation-delay: 0.20s; }
        .screening-slide.active .timeline-row:nth-child(6) { animation-delay: 0.25s; }

        .timeline-col {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .timeline-col.left-col {
            justify-content: flex-end;
            padding-right: 25px;
        }

        .timeline-col.right-col {
            justify-content: flex-start;
            padding-left: 25px;
        }

        .timeline-col.empty-col {
            visibility: hidden;
            pointer-events: none;
        }

        /* Circular timeline node */
        .timeline-node {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ffffff;
            border: 3px solid #cbd5e1;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Active highlight for row/button selections */
        .timeline-row.selected .timeline-node {
            border-color: #0383ef;
            background: #0383ef;
            box-shadow: 0 0 0 5px rgba(3, 131, 239, 0.15);
            transform: translateX(-50%) scale(1.1);
        }

        /* Premium timeline buttons */
        .timeline-btn {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 18px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.01);
            min-width: 170px;
            text-align: center;
            white-space: normal;
            display: inline-block;
        }

        .timeline-btn:hover {
            border-color: rgba(3, 131, 239, 0.4);
            color: #0383ef;
            background: rgba(3, 131, 239, 0.01);
        }

        .timeline-btn.selected {
            background: #0383ef;
            border-color: #0383ef;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(3, 131, 239, 0.15);
        }

        .timeline-btn.selected:hover {
            box-shadow: 0 6px 16px rgba(3, 131, 239, 0.2);
            color: #ffffff;
        }

        /* Premium Pagination styling as separate elegant boxes */
        .pagination {
            display: flex;
            gap: 6px;
            padding-left: 0;
            list-style: none;
            border: none;
            flex-wrap: nowrap;
            max-width: 100%;
        }

        .page-item .page-link {
            color: #475569;
            border: 1px solid #e2e8f0;
            padding: 8px 14px;
            font-weight: 600;
            transition: all 0.2s ease;
            background: #ffffff;
            border-radius: 8px !important;
            display: block;
            text-align: center;
            min-width: 40px;
        }

        .page-item .page-link:hover {
            background: #f1f5f9;
            color: #0383ef;
            border-color: #cbd5e1;
            text-decoration: none;
        }

        .page-item.active .page-link {
            background: #0383ef;
            border-color: #0383ef;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(3, 131, 239, 0.15);
        }

        .page-item.active .page-link:hover {
            color: #ffffff;
            background: #026ebd;
        }

        .page-item.answered .page-link {
            border-bottom: 3px solid #10b981 !important;
        }

        /* Footer Controls */
        .screening-footer {
            background: #ffffff;
            padding: 30px 0 0 0;
            border-top: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            width: 100%;
        }

        .pagination-nav-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            overflow: hidden;
        }

        .nav-btn {
            border-radius: 100px;
            font-weight: 600;
            padding: 10px 24px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .nav-btn-prev {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .nav-btn-prev:hover {
            background: #e2e8f0;
            color: #1e293b;
            text-decoration: none;
        }

        .nav-btn-next {
            background: #0383ef;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(3, 131, 239, 0.1);
            border: none;
        }

        .nav-btn-next:hover {
            background: #026ebd;
            box-shadow: 0 6px 16px rgba(3, 131, 239, 0.2);
            text-decoration: none;
            color: #ffffff;
        }

        .nav-btn-submit {
            background: #10b981;
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        }

        .nav-btn-submit:hover {
            background: #059669;
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.25);
            color: #ffffff;
        }

        /* Custom Float Animations */
        @keyframes float-icon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Hide scrollbars globally on swipable pagination and enable scrolling on all screens */
        #screeningPagination {
            display: flex !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
            -webkit-overflow-scrolling: touch;
        }
        #screeningPagination::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        /* =========================================================
           MOBILE RESPONSIVENESS OVERRIDES
           ========================================================= */

        /* 1. Tablet & Lower Styles */
        @media (max-width: 768px) {
            .screening-wrapper {
                padding: 30px 0;
            }

            .screening-card {
                padding: 24px;
                border-radius: 16px;
            }

            nav[aria-label="Page navigation"] {
                width: 100% !important;
                max-width: 100% !important;
                overflow: hidden !important;
            }

            #screeningPagination {
                display: flex !important;
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                justify-content: center !important;
                padding: 8px 10px !important;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                width: 100% !important;
                max-width: 100% !important;
                -webkit-overflow-scrolling: touch;
            }

            #screeningPagination::-webkit-scrollbar {
                height: 4px;
            }

            #screeningPagination::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }

            .page-item {
                flex-shrink: 0 !important;
            }

            .page-item .page-link {
                padding: 6px 12px !important;
                font-size: 13px !important;
            }

            .screening-footer {
                padding: 24px 0 0 0 !important;
                gap: 15px !important;
            }

            .pagination-nav-wrapper {
                width: 100% !important;
                max-width: 100% !important;
                margin: 10px 0 !important;
            }

            .nav-btn-submit {
                width: 100% !important;
                text-align: center !important;
            }
        }

        /* 2. Narrow Mobile Viewports */
        @media (max-width: 576px) {
            .question-title-text {
                font-size: 18px !important;
                margin-bottom: 15px !important;
            }

            .illustration-frame {
                min-height: 200px !important;
                padding: 12px !important;
            }

            .illustration-img {
                max-height: 190px !important;
            }

            /* Shift the timeline path to the left edge */
            .timeline-line-path {
                left: 15px !important;
                transform: none !important;
            }

            /* Indent all rows to leave space on the left for the line & node */
            .timeline-row {
                justify-content: flex-start !important;
                padding-left: 45px !important;
                margin-bottom: 20px !important;
            }

            .timeline-col {
                flex: none !important;
                width: 100% !important;
            }

            .timeline-col.left-col {
                justify-content: flex-start !important;
                padding-right: 0 !important;
            }

            .timeline-col.right-col {
                justify-content: flex-start !important;
                padding-left: 0 !important;
            }

            .timeline-col.empty-col {
                display: none !important;
            }

            /* Force node circles to align along the left path */
            .timeline-node {
                left: 15px !important;
                transform: translateY(-50%) !important;
                top: 50% !important;
            }

            .timeline-row.selected .timeline-node {
                transform: translateY(-50%) scale(1.1) !important;
            }

            /* Timeline buttons stretch to full width and align text left */
            .timeline-btn {
                width: 100% !important;
                min-width: 0 !important;
                text-align: left !important;
                padding: 12px 16px !important;
            }
        }
    </style>

    <div class="screening-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="screening-card">

                        <!-- Top Progress Bar Container (Preserved) -->
                        <div class="progress-container">
                            <div class="progress-header">
                                <span class="progress-title">
                                    <i class="fa fa-chart-line text-primary mr-2"></i>Kemajuan Skrining: 
                                    <span id="currentQuestionText" class="font-weight-bold text-slate-800">1</span> dari <span class="font-weight-bold">{{ count($gejala) }}</span>
                                </span>
                                <span class="progress-percentage" id="progressPercentText">0%</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" id="progressBarFill"></div>
                            </div>
                        </div>

                        <!-- Main Screening Form -->
                        <form action="{{ route('diagnosis.hasil') }}" method="post" id="screeningForm">
                            @csrf

                            <!-- Hidden inputs for mapping final post back values -->
                            @foreach ($gejala as $row)
                                <input type="hidden" name="gejala[{{ $row->id }}]" id="gejala_input_{{ $row->id }}" value="{{ old('gejala.' . $row->id, '0') }}">
                            @endforeach

                            <!-- Deck of Slides -->
                            <div class="slides-deck">
                                @foreach ($gejala as $index => $row)
                                    <div class="screening-slide {{ $index === 0 ? 'active' : '' }}" id="slide_{{ $index }}" data-index="{{ $index }}" data-id="{{ $row->id }}">
                                        
                                        <!-- Heading: Left-aligned title (matching left panel content edge) -->
                                        <div class="text-left mb-4">
                                            <span class="question-code-badge">Gejala {{ $row->kode_gejala }}</span>
                                            <h1 class="question-title-text text-left mt-2 mb-0">{{ $row->nama_gejala }}</h1>
                                        </div>

                                        <div class="row align-items-center mt-3">
                                            <!-- Left side: Illustration GIF/Image Frame -->
                                            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                                                <div class="illustration-frame">
                                                    @if ($row->animasi)
                                                        <img src="{{ Storage::url($row->animasi) }}" alt="Animasi {{ $row->kode_gejala }}" class="illustration-img">
                                                    @else
                                                        <div class="text-center">
                                                            <i class="fa fa-gamepad illustration-placeholder-icon"></i>
                                                            <p class="text-muted font-italic m-0 mt-3" style="font-size: 13px;">Ilustrasi Pendukung {{ $row->kode_gejala }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Right side: Interactive Vertical Zig-Zag Timeline -->
                                            <div class="col-lg-6">
                                                <div class="options-container pl-lg-3">
                                                    <span class="options-list-label mb-4">
                                                        <i class="fa fa-heartbeat text-danger mr-2"></i>Tingkat Keyakinan Anda:
                                                    </span>

                                                    <div class="timeline-wrapper" data-gejala-id="{{ $row->id }}">
                                                        <div class="timeline-line-path"></div>

                                                        <!-- Row 1: Tidak Yakin (Left Side) - Value 0 -->
                                                        <div class="timeline-row {{ old('gejala.' . $row->id) === '0' ? 'selected' : '' }}">
                                                            <div class="timeline-col left-col">
                                                                <button type="button" class="btn timeline-btn {{ old('gejala.' . $row->id) === '0' ? 'selected' : '' }}" data-value="0">
                                                                    Tidak Yakin
                                                                </button>
                                                            </div>
                                                            <div class="timeline-node"></div>
                                                            <div class="timeline-col empty-col"></div>
                                                        </div>

                                                        <!-- Row 2: Cukup Yakin (Right Side) - Value 0.4 -->
                                                        <div class="timeline-row {{ old('gejala.' . $row->id) === '0.4' ? 'selected' : '' }}">
                                                            <div class="timeline-col empty-col"></div>
                                                            <div class="timeline-node"></div>
                                                            <div class="timeline-col right-col">
                                                                <button type="button" class="btn timeline-btn {{ old('gejala.' . $row->id) === '0.4' ? 'selected' : '' }}" data-value="0.4">
                                                                    Cukup Yakin
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Row 3: Yakin (Left Side) - Value 0.6 -->
                                                        <div class="timeline-row {{ old('gejala.' . $row->id) === '0.6' ? 'selected' : '' }}">
                                                            <div class="timeline-col left-col">
                                                                <button type="button" class="btn timeline-btn {{ old('gejala.' . $row->id) === '0.6' ? 'selected' : '' }}" data-value="0.6">
                                                                    Yakin
                                                                </button>
                                                            </div>
                                                            <div class="timeline-node"></div>
                                                            <div class="timeline-col empty-col"></div>
                                                        </div>

                                                        <!-- Row 4: Sangat Yakin (Right Side) - Value 0.8 -->
                                                        <div class="timeline-row {{ old('gejala.' . $row->id) === '0.8' ? 'selected' : '' }}">
                                                            <div class="timeline-col empty-col"></div>
                                                            <div class="timeline-node"></div>
                                                            <div class="timeline-col right-col">
                                                                <button type="button" class="btn timeline-btn {{ old('gejala.' . $row->id) === '0.8' ? 'selected' : '' }}" data-value="0.8">
                                                                    Sangat Yakin
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Row 5: Sangat Yakin Sekali / Pasti (Left Side) - Value 1.0 -->
                                                        <div class="timeline-row {{ old('gejala.' . $row->id) === '1.0' ? 'selected' : '' }}">
                                                            <div class="timeline-col left-col">
                                                                <button type="button" class="btn timeline-btn {{ old('gejala.' . $row->id) === '1.0' ? 'selected' : '' }}" data-value="1.0">
                                                                    Sangat Yakin / Pasti
                                                                </button>
                                                            </div>
                                                            <div class="timeline-node"></div>
                                                            <div class="timeline-col empty-col"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <!-- Footer Actions & Pagination -->
                            <div class="screening-footer text-center">
                                <nav aria-label="Page navigation" class="pagination-nav-wrapper my-2 my-lg-0">
                                    <ul class="pagination justify-content-center mb-0" id="screeningPagination">
                                        <li class="page-item" id="pagPrev">
                                            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        @foreach ($gejala as $index => $row)
                                            <li class="page-item {{ $index === 0 ? 'active' : '' }}" id="pag_{{ $index }}" data-target-index="{{ $index }}">
                                                <a class="page-link" href="javascript:void(0)">{{ $index + 1 }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item" id="pagNext">
                                            <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="mt-3" id="submitBtnContainer" style="display: none; width: 100%;">
                                    <button type="submit" class="btn nav-btn nav-btn-submit mx-auto" id="btnSubmitForm">
                                        <i class="fa fa-check-circle mr-2"></i> Proses Hasil Skrining
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for minimal answered symptoms warning -->
    <div class="modal fade" id="modalinformasi" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <div class="modal-header bg-danger text-white p-3">
                    <h5 class="modal-title font-weight-bold" id="modalTitle"><i class="fa fa-exclamation-triangle mr-2"></i>Informasi Diagnosis</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4">
                    <i class="fa fa-heart-broken text-danger fa-4x mb-3 animate pulse"></i>
                    <h4 class="font-weight-bold text-slate-800">Skrining Kurang Memadai</h4>
                    <p class="text-muted mt-2">Untuk menghasilkan diagnosis yang akurat dengan metode Certainty Factor, mohon isi minimal <strong>2 gejala aktif</strong> (gejala dengan tingkat keyakinan selain "Tidak Yakin").</p>
                </div>
                <div class="modal-footer p-2 bg-light d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-4 font-weight-bold" data-dismiss="modal" style="border-radius: 20px;">Tutup & Lengkapi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            var currentIdx = 0;
            var totalSlides = {{ count($gejala) }};
            var answeredTracker = {}; // tracks which question indices have been answered

            // Initialize answeredTracker on page load based on pre-selected classes (from old values)
            $('.screening-slide').each(function(idx) {
                var hasSelection = $(this).find('.timeline-row.selected').length > 0;
                if (hasSelection) {
                    answeredTracker[idx] = true;
                    $('#pag_' + idx).addClass('answered');
                }
            });

            // Initialize progress bar, slide arrow states, and sliding pagination window
            updateProgress();
            updatePaginationArrows();
            updatePaginationWindow();

            // Setup direct click navigation for numbered pagination items
            $('#screeningPagination').on('click', '.page-item[data-target-index] .page-link', function(e) {
                e.preventDefault();
                var targetIdx = parseInt($(this).closest('.page-item').data('target-index'));
                goToSlide(targetIdx);
            });

            // Pagination arrow clicks
            $('#pagPrev').click(function(e) {
                e.preventDefault();
                if (currentIdx > 0) {
                    goToSlide(currentIdx - 1);
                }
            });

            // Pagination arrow clicks
            $('#pagNext').click(function(e) {
                e.preventDefault();
                if (currentIdx < totalSlides - 1) {
                    goToSlide(currentIdx + 1);
                }
            });

            // Handlers for timeline option selection
            $('.timeline-btn').click(function() {
                var $btn = $(this);
                var $row = $btn.closest('.timeline-row');
                var $wrapper = $btn.closest('.timeline-wrapper');
                var gejalaId = $wrapper.data('gejala-id');
                var chosenVal = $btn.data('value');

                // Toggle selection states visually within current option list
                $wrapper.find('.timeline-row').removeClass('selected');
                $wrapper.find('.timeline-btn').removeClass('selected');
                
                $row.addClass('selected');
                $btn.addClass('selected');

                // Update the actual hidden form input value
                $('#gejala_input_' + gejalaId).val(chosenVal);

                // Track answered state (indices that have explicitly set a value)
                answeredTracker[currentIdx] = true;
                $('#pag_' + currentIdx).addClass('answered');

                // Refresh progress percentage and bar calculations
                updateProgress();

                // Auto-advance slideshow with a premium feeling 500ms delay
                if (currentIdx < totalSlides - 1) {
                    setTimeout(function() {
                        goToSlide(currentIdx + 1);
                    }, 500);
                } else {
                    // We are on the final slide! Since they just answered it, show the submit button!
                    $('#submitBtnContainer').show().addClass('animate pulse infinite');
                }
            });

            // Main slideshow navigator function
            function goToSlide(targetIdx) {
                if (targetIdx < 0 || targetIdx >= totalSlides || targetIdx === currentIdx) return;

                // Deactivate current slide
                var $currentSlide = $('#slide_' + currentIdx);
                $currentSlide.removeClass('active');

                // Set new index
                currentIdx = targetIdx;

                // Activate target slide
                var $targetSlide = $('#slide_' + currentIdx);
                $targetSlide.addClass('active');

                // Update text number indicators
                $('#currentQuestionText').text(currentIdx + 1);

                // Update pagination states
                $('#screeningPagination .page-item').removeClass('active');
                $('#pag_' + currentIdx).addClass('active');

                // Update visible pagination sliding window
                updatePaginationWindow();

                // Manage pagination arrow states
                updatePaginationArrows();

                // Show/hide submit button on the final slide only if it is answered
                if (currentIdx === totalSlides - 1 && answeredTracker[currentIdx]) {
                    $('#submitBtnContainer').show().addClass('animate pulse infinite');
                } else {
                    $('#submitBtnContainer').hide().removeClass('animate pulse infinite');
                }

                // Scroll the pagination element to center the active page
                scrollToActivePaginationItem();
            }

            // Center scroll helper for horizontally swipable mobile pagination
            function scrollToActivePaginationItem() {
                var $pagination = $('#screeningPagination');
                var $activeItem = $('#pag_' + currentIdx);

                if ($pagination.length && $activeItem.length) {
                    var activeOffset = $activeItem.position().left;
                    var containerWidth = $pagination.width();
                    var itemWidth = $activeItem.outerWidth();
                    
                    var scrollTarget = $pagination.scrollLeft() + activeOffset - (containerWidth / 2) + (itemWidth / 2);
                    $pagination.animate({ scrollLeft: scrollTarget }, 300);
                }
            }

            // Update disabled status for pagination arrows
            function updatePaginationArrows() {
                if (currentIdx === 0) {
                    $('#pagPrev').addClass('disabled');
                } else {
                    $('#pagPrev').removeClass('disabled');
                }

                if (currentIdx === totalSlides - 1) {
                    $('#pagNext').addClass('disabled');
                } else {
                    $('#pagNext').removeClass('disabled');
                }
            }

            // Dynamic sliding window of 5 pages centered around active page
            function updatePaginationWindow() {
                var visibleCount = 5;
                var currentPage = currentIdx + 1; // 1-based index
                
                var startPage = Math.max(1, currentPage - 2);
                var endPage = startPage + visibleCount - 1;
                
                if (endPage > totalSlides) {
                    endPage = totalSlides;
                    startPage = Math.max(1, endPage - visibleCount + 1);
                }
                
                // Show or hide individual page items dynamically
                for (var i = 0; i < totalSlides; i++) {
                    var pageNum = i + 1;
                    var $pageItem = $('#pag_' + i);
                    
                    if (pageNum >= startPage && pageNum <= endPage) {
                        $pageItem.show();
                    } else {
                        $pageItem.hide();
                    }
                }
            }

            // Calculation function for updating screening progress percentage & bar width
            function updateProgress() {
                var answeredCount = Object.keys(answeredTracker).length;
                var pct = Math.round((answeredCount / totalSlides) * 100);

                $('#progressBarFill').css('width', pct + '%');
                $('#progressPercentText').text(pct + '%');
            }

            // Verify form validation before final submission
            $('#screeningForm').submit(function(e) {
                var activeSymptomsCount = 0;

                // Count questions that are active (selected value > 0)
                $('input[id^="gejala_input_"]').each(function() {
                    var val = parseFloat($(this).val());
                    if (val > 0) {
                        activeSymptomsCount++;
                    }
                });

                // Under certainty factor logic, at least 2 active symptoms are required
                if (activeSymptomsCount < 2) {
                    e.preventDefault();
                    $('#modalinformasi').modal('show');
                    return false;
                }

                // If check succeeds, let the post submit normally
                return true;
            });
        });
    </script>
@endsection
