/* ============================
       Helper utilities
       ============================ */
function $(sel, root = document) {
    return root.querySelector(sel);
}

function $all(sel, root = document) {
    return Array.from(root.querySelectorAll(sel));
}

document.addEventListener("DOMContentLoaded", function () {
    /* ============================
           Slider state
           ============================ */
    const slider = document.getElementById("socialSlider");
    const slides = $all(".slide", slider);
    const thumbs = $all(".thumb", slider);
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const autoplayToggle = document.getElementById("autoplayToggle");
    const heroVideo = document.getElementById("heroVideo");

    let index = 0;
    let auto = true;
    let timer = null;
    const AUTO_INTERVAL = 4500;

    // lazy-load video sources from data-src to src
    function lazyLoadVideo(el) {
        if (!el) return;
        const src = el.getAttribute("data-src");
        if (!el.getAttribute("src") && src) {
            el.setAttribute("src", src);
        }
    }

    // ensure thumb video previews are playing muted loop silently
    function initThumbPreviews() {
        thumbs.forEach((t, i) => {
            const vid = t.querySelector("video");
            if (vid) {
                // if the thumb already has src, keep it; otherwise try to lazy load from data-src attr
                lazyLoadVideo(vid);
                vid.muted = true;
                vid.loop = true;
                vid.playsInline = true;
                vid.play().catch(() => {
                    /* autoplay blocked — ok */
                });
            }
        });
    }

    // prepare slides: lazy load first slide immediately
    slides.forEach((s, i) => {
        const v = s.querySelector("video");
        if (i === index) {
            lazyLoadVideo(v);
            v.muted = true;
            v.playsInline = true;
        }
    });

    // play only the active slide video
    function playActiveVideo(i) {
        slides.forEach((s, idx) => {
            const v = s.querySelector("video");
            if (!v) return;
            if (idx === i) {
                lazyLoadVideo(v);
                v.muted = true;
                v.play().catch(() => {
                    /* autoplay blocked; user can press play */
                });
            } else {
                try {
                    v.pause();
                    v.currentTime = 0;
                } catch (e) {}
            }
        });
    }

    // update visible slide and thumb classes and accessibility attributes
    function showSlide(i, userTriggered = false) {
        if (i < 0) i = slides.length - 1;
        if (i >= slides.length) i = 0;
        slides.forEach((s, idx) => {
            const isActive = idx === i;
            s.classList.toggle("active", isActive);
            s.setAttribute("aria-hidden", !isActive);
        });
        thumbs.forEach((t, idx) => {
            t.classList.toggle("active", idx === i);
            t.setAttribute("aria-current", idx === i ? "true" : "false");
        });
        index = i;
        // lazy load current and neighbors
        const actVid = slides[i].querySelector("video");
        lazyLoadVideo(actVid);
        const nextIdx = (i + 1) % slides.length;
        const prevIdx = (i - 1 + slides.length) % slides.length;
        [nextIdx, prevIdx].forEach((j) => {
            const v = slides[j].querySelector("video");
            lazyLoadVideo(v);
        });
        playActiveVideo(i);

        if (userTriggered) resetAuto();
    }

    // navigation helpers
    function nextSlide(userTriggered = false) {
        showSlide((index + 1) % slides.length, userTriggered);
    }

    function prevSlide(userTriggered = false) {
        showSlide((index - 1 + slides.length) % slides.length, userTriggered);
    }

    // autoplay engine
    function startAuto() {
        if (timer) clearInterval(timer);
        if (!auto) return;
        timer = setInterval(() => nextSlide(false), AUTO_INTERVAL);
        autoplayToggle.textContent = "Auto • On";
        autoplayToggle.setAttribute("aria-pressed", "true");
    }

    function stopAuto() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
        autoplayToggle.textContent = "Auto • Off";
        autoplayToggle.setAttribute("aria-pressed", "false");
    }

    function resetAuto() {
        stopAuto();
        if (auto) {
            setTimeout(startAuto, 1400);
        }
    }

    // attach events
    nextBtn.addEventListener("click", () => nextSlide(true));
    prevBtn.addEventListener("click", () => prevSlide(true));
    autoplayToggle.addEventListener("click", () => {
        auto = !auto;
        if (auto) startAuto();
        else stopAuto();
    });
    autoplayToggle.addEventListener("keydown", (e) => {
        if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            auto = !auto;
            if (auto) startAuto();
            else stopAuto();
        }
    });

    thumbs.forEach((t, idx) => {
        t.addEventListener("click", () => {
            showSlide(idx, true);
        });
        t.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                showSlide(idx, true);
            } else if (e.key === "ArrowRight") {
                showSlide(Math.min(idx + 1, thumbs.length - 1), true);
            } else if (e.key === "ArrowLeft") {
                showSlide(Math.max(idx - 1, 0), true);
            }
        });
        t.addEventListener("mouseenter", () => {
            const v = t.querySelector("video");
            if (v) {
                lazyLoadVideo(v);
                v.play().catch(() => {});
            }
        });
        t.addEventListener("mouseleave", () => {
            const v = t.querySelector("video");
            if (v) {
                try {
                    v.pause();
                    v.currentTime = 0;
                } catch (e) {}
            }
        });
    });

    // keyboard support for slider arrows
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") nextSlide(true);
        if (e.key === "ArrowLeft") prevSlide(true);
    });

    // touch swipe for slider-main
    (function addTouch() {
        const el = document.getElementById("sliderMain");
        if (!el) return;
        let startX = 0,
            startY = 0,
            dist = 0,
            startTime = 0;
        el.addEventListener(
            "touchstart",
            function (e) {
                const t = e.changedTouches[0];
                startX = t.pageX;
                startY = t.pageY;
                startTime = new Date().getTime();
                stopAuto();
            },
            {
                passive: true,
            }
        );
        el.addEventListener(
            "touchend",
            function (e) {
                const t = e.changedTouches[0];
                dist = t.pageX - startX;
                const elapsed = new Date().getTime() - startTime;
                if (Math.abs(dist) > 60 && elapsed < 600) {
                    if (dist < 0) nextSlide(true);
                    else prevSlide(true);
                }
                if (auto) startAuto();
            },
            {
                passive: true,
            }
        );
    })();

    // initialize thumb previews
    initThumbPreviews();

    // start first slide active video playing
    showSlide(index, false);
    if (auto) startAuto();

    /* ============================
           Counter animation on scroll
           ============================ */
    const counters = [
        {
            id: "statPosts",
            target: 1200,
        },
        {
            id: "statReels",
            target: 420,
        },
        {
            id: "statCampaigns",
            target: 88,
        },
        {
            id: "statClients",
            target: 65,
        },
    ];
    const ANIM_DURATION = 1400;

    function animateCounter(el, end, duration) {
        let start = 0;
        let startTime = null;

        function step(ts) {
            if (!startTime) startTime = ts;
            const progress = Math.min((ts - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            el.textContent = value + (end > 1 ? "+" : "");
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = end + "+";
        }
        requestAnimationFrame(step);
    }

    let countersStarted = false;

    function checkCounters() {
        if (countersStarted) return;
        const section = document.querySelector(".stats-row");
        if (!section) return;
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            counters.forEach((c) => {
                const el = document.getElementById(c.id);
                if (el) animateCounter(el, c.target, ANIM_DURATION);
            });
            countersStarted = true;
            window.removeEventListener("scroll", checkCounters);
        }
    }
    window.addEventListener("scroll", checkCounters);
    window.addEventListener("load", checkCounters);
    setTimeout(checkCounters, 300);

    /* ============================
           Accessibility: Pause hero on reduced motion
           ============================ */
    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;
    if (prefersReducedMotion) {
        if (heroVideo) {
            heroVideo.pause();
            heroVideo.removeAttribute("autoplay");
        }
        thumbs.forEach((t) => {
            const v = t.querySelector("video");
            if (v)
                try {
                    v.pause();
                } catch (e) {}
        });
        slides.forEach((s) => {
            const v = s.querySelector("video");
            if (v)
                try {
                    v.pause();
                } catch (e) {}
        });
        stopAuto();
    }
});
