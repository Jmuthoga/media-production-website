(function () {
    const slider = document.getElementById("portraitSlider");
    if (!slider) return;

    const slides = Array.from(slider.querySelectorAll(".slide"));
    const thumbs = Array.from(slider.querySelectorAll(".thumb"));
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const autoplayIndicator = document.getElementById("autoplayIndicator");

    let idx = 0;
    let autoplay = true;
    let autoplayInterval = 4500;
    let timer = null;

    function showSlide(newIndex) {
        if (newIndex < 0) newIndex = slides.length - 1;
        if (newIndex >= slides.length) newIndex = 0;
        slides.forEach((s, i) => {
            const isActive = i === newIndex;
            s.classList.toggle("active", isActive);
            s.setAttribute("aria-hidden", !isActive);
            s.tabIndex = isActive ? 0 : -1;
        });
        thumbs.forEach((t, i) => {
            t.classList.toggle("active", i === newIndex);
            t.setAttribute("aria-pressed", i === newIndex ? "true" : "false");
        });
        idx = newIndex;
    }

    function next() {
        showSlide(idx + 1);
    }

    function prev() {
        showSlide(idx - 1);
    }

    function startAutoplay() {
        if (timer) clearInterval(timer);
        timer = setInterval(next, autoplayInterval);
        autoplay = true;
        autoplayIndicator.textContent = "Auto • On";
    }

    function stopAutoplay() {
        if (timer) clearInterval(timer);
        timer = null;
        autoplay = false;
        autoplayIndicator.textContent = "Auto • Off";
    }

    // init listeners
    nextBtn.addEventListener("click", (e) => {
        e.preventDefault();
        next();
        stopAutoplay();
    });
    prevBtn.addEventListener("click", (e) => {
        e.preventDefault();
        prev();
        stopAutoplay();
    });

    thumbs.forEach((t) => {
        const i = parseInt(t.dataset.index, 10);
        t.addEventListener("click", () => {
            showSlide(i);
            stopAutoplay();
        });
        t.addEventListener("keydown", (ev) => {
            if (ev.key === "Enter" || ev.key === " ") {
                ev.preventDefault();
                showSlide(i);
                stopAutoplay();
            }
        });
    });

    slider.addEventListener("mouseenter", () => {
        stopAutoplay();
    });
    slider.addEventListener("mouseleave", () => {
        startAutoplay();
    });

    document.addEventListener("keydown", (ev) => {
        if (ev.key === "ArrowRight") {
            next();
            stopAutoplay();
        }
        if (ev.key === "ArrowLeft") {
            prev();
            stopAutoplay();
        }
    });

    // Responsive: pause autoplay on small devices to save CPU/memory if desired
    function handleVisibility() {
        if (document.hidden) stopAutoplay();
        else startAutoplay();
    }
    document.addEventListener("visibilitychange", handleVisibility);

    // kick off
    showSlide(0);
    startAutoplay();

    // lazy-resize slides on load/resize for canvas-like layout (if you add dynamic sizes)
    window.addEventListener("resize", () => {
        // placeholder for any responsive adjustments
    });

    // make autoplay indicator clickable to toggle
    autoplayIndicator.addEventListener("click", () => {
        if (autoplay) stopAutoplay();
        else startAutoplay();
    });
})();

/* ===== Counters that animate when in view ===== */
(function () {
    const counters = [
        {
            id: "statClients",
            target: 500,
        },
        {
            id: "statTeam",
            target: 50,
        },
        {
            id: "statProjects",
            target: 3000,
        },
        {
            id: "statYears",
            target: 15,
        },
    ];
    const duration = 1700;

    function animateValue(el, start, end, duration) {
        let startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            el.textContent = value + (end > 1 ? "+" : "");
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = end + "+";
        }
        requestAnimationFrame(step);
    }

    let started = false;

    function checkStart() {
        if (started) return;
        const section = document.querySelector(".stats-row");
        if (!section) return;
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            counters.forEach((c) => {
                const el = document.getElementById(c.id);
                if (el) animateValue(el, 0, c.target, duration);
            });
            started = true;
            window.removeEventListener("scroll", checkStart);
        }
    }
    window.addEventListener("scroll", checkStart);
    window.addEventListener("load", checkStart);
    // also trigger initially in case it's already visible
    setTimeout(checkStart, 300);
})();
