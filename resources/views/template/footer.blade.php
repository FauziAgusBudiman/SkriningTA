<!-- footer section -->
<style>
    /* Premium Footer Overrides */
    .footer_section {
        background: linear-gradient(180deg, #0383ef 0%, #024884 100%) !important;
        color: #ffffff;
        padding: 60px 0 30px 0;
        position: relative;
        overflow: hidden;
    }

    .footer_section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: rgba(255, 255, 255, 0.15);
    }

    .footer_col h4 {
        color: #ffffff !important;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 12px;
    }

    .footer_col h4::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 32px;
        height: 3px;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 2px;
    }

    .footer_detail p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
        line-height: 1.6;
        margin-top: 15px;
    }

    .footer_social {
        display: flex;
        gap: 12px;
        margin-top: 24px;
    }

    .footer_social a {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff !important;
        font-size: 15px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        text-decoration: none;
    }

    .footer_social a:hover {
        background: #ffffff;
        color: #0383ef !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .contact_link_box {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 15px;
    }

    .contact_link_box a {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.85) !important;
        font-size: 14px;
        transition: color 0.2s ease;
        text-decoration: none;
    }

    .contact_link_box a:hover {
        color: #ffffff !important;
    }

    .contact_link_box a i {
        color: rgba(255, 255, 255, 0.9);
        font-size: 15px;
    }

    .footer-info {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 40px;
        padding-top: 24px;
        text-align: center;
    }

    .footer-info p {
        color: rgba(255, 255, 255, 0.6) !important;
        font-size: 13px;
        margin: 0;
    }

    .footer-info a {
        color: #ffffff !important;
        font-weight: 600;
        text-decoration: none;
    }

    .footer-info a:hover {
        text-decoration: underline;
    }

    /* =========================================================
       PREMIUM FLYER SPLASH OVERLAY
       ========================================================= */
    .flyer-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        z-index: 999999;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease, visibility 0.4s ease;
    }

    .flyer-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .flyer-content {
        position: relative;
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
        padding: 24px;
        width: 90%;
        max-width: 520px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transform: scale(0.92) translateY(15px);
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .flyer-overlay.active .flyer-content {
        transform: scale(1) translateY(0);
    }

    .flyer-close-btn {
        position: absolute;
        top: 14px;
        right: 18px;
        background: none;
        border: none;
        font-size: 32px;
        color: #94a3b8;
        cursor: pointer;
        transition: color 0.2s ease;
        line-height: 1;
        outline: none !important;
    }

    .flyer-close-btn:hover {
        color: #0f172a;
    }

    .flyer-img-container {
        width: 100%;
        max-height: 60vh;
        overflow: hidden;
        border-radius: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        margin-top: 15px;
    }

    .flyer-img {
        max-width: 100%;
        max-height: 60vh;
        object-fit: contain;
    }

    @media (max-width: 576px) {
        .flyer-content {
            padding: 16px;
            border-radius: 20px;
        }
        .flyer-img-container {
            max-height: 52vh;
        }
        .flyer-img {
            max-height: 52vh;
        }
    }
</style>

<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 footer_col">
                <div class="footer_detail">
                    <h4>
                        Sistem Pakar Skrining Kecanduan Game Online
                    </h4>
                    <p>
                        Aplikasi ini untuk Menskrining kecanduan game online berdasarkan gejala-gejala yang dirasakan
                    </p>
                </div>
                <div class="footer_social">
                    <a href="https://facebook.com/#" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/#" target="_blank">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="https://instagram.com/#" target="_blank">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-2 footer_col">
            </div>
            <div class="col-md-4 footer_col">
                <div class="footer_contact">
                    <h4>
                        Kontak
                    </h4>
                    <div class="contact_link_box">
                        <a href="mailto:SkriningApp@gmail.com" target="_blank">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                SkriningApp@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-info">
            <p>
                &copy; @php echo date('Y') @endphp - <a href="#">SkriningApp</a>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->

<!-- Premium Flyer Overlay -->
<div id="flyerOverlay" class="flyer-overlay">
    <div class="flyer-content">
        <button type="button" class="flyer-close-btn" id="btnExitFlyerTop" aria-label="Close flyer">&times;</button>
        <div class="flyer-img-container" style="margin-top: 25px;">
            <img src="{{ asset('assets/images/flyer.svg') }}" alt="Flyer Skrining" class="flyer-img">
        </div>
    </div>
</div>

<script>
    // Vanilla JS to show the flyer only on first visit or refresh, preventing popup on page navigation
    document.addEventListener("DOMContentLoaded", function() {
        var flyer = document.getElementById("flyerOverlay");
        var btnTop = document.getElementById("btnExitFlyerTop");
        
        if (flyer) {
            var shouldShow = false;

            // Check if this is the first load of the session
            if (!sessionStorage.getItem("flyerShown")) {
                shouldShow = true;
                sessionStorage.setItem("flyerShown", "true");
            } else {
                // If it's not the first load, check if it was a reload/refresh
                var navigationEntries = performance.getEntriesByType("navigation");
                if (navigationEntries.length > 0 && navigationEntries[0].type === "reload") {
                    shouldShow = true;
                } else if (typeof performance.navigation !== "undefined" && performance.navigation.type === 1) {
                    // Fallback for older browser versions
                    shouldShow = true;
                }
            }

            if (shouldShow) {
                // Lock body scroll
                document.body.style.overflow = "hidden";
                
                // Fade-in after a slight delay
                setTimeout(function() {
                    flyer.classList.add("active");
                }, 300);

                function hideFlyer() {
                    flyer.classList.remove("active");
                    document.body.style.overflow = "";
                }

                if (btnTop) btnTop.addEventListener("click", hideFlyer);

                // Close when clicking the glass backdrop
                flyer.addEventListener("click", function(e) {
                    if (e.target === flyer) {
                        hideFlyer();
                    }
                });
            } else {
                // If we shouldn't show it, hide the overlay container immediately
                flyer.style.display = "none";
            }
        }
    });
</script>
