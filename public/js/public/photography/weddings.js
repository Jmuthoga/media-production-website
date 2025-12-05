document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("weddingSlider");
    if (!slider) return;

    const slides = Array.from(slider.querySelectorAll(".slide"));
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const zoomInBtn = document.getElementById("zoomIn");
    const zoomOutBtn = document.getElementById("zoomOut");
    const autoplayIndicator = document.querySelector(".autoplay-indicator");

    let currentIndex = 0;
    let currentScale = 1;
    let zoomDirection = 1;
    const maxZoom = 1.2;
    const minZoom = 1;
    const zoomSpeed = 0.002;
    const slideDuration = 7000;
    let slideTimer = null;

    // Preload images
    slides.forEach((slide) => {
        const img = slide.querySelector("img.zoomable");
        const pre = new Image();
        pre.src = img.src;
    });

    function getThumbs() {
        return Array.from(document.querySelectorAll(".thumb"));
    }

    function showSlide(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;

        slides.forEach((slide, i) => {
            const isActive = i === index;
            slide.style.opacity = isActive ? 1 : 0;
            slide.setAttribute("aria-hidden", !isActive);
            slide.tabIndex = isActive ? 0 : -1;
            slide.querySelector("img.zoomable").style.transform = "scale(1)";
        });

        const thumbs = getThumbs(); // query dynamically
        thumbs.forEach((t, i) => {
            t.style.border =
                i === index ? "2px solid #000" : "2px solid transparent";
            t.setAttribute("aria-pressed", i === index ? "true" : "false");
        });

        currentIndex = index;
        currentScale = 1;
        zoomDirection = 1;
        resetSlideTimer();
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }
    function prevSlide() {
        showSlide(currentIndex - 1);
    }
    function resetSlideTimer() {
        clearTimeout(slideTimer);
        slideTimer = setTimeout(nextSlide, slideDuration);
    }

    function updateZoom() {
        const img = slides[currentIndex].querySelector("img.zoomable");
        img.style.transform = `scale(${currentScale})`;
    }

    if (zoomInBtn)
        zoomInBtn.addEventListener("click", () => {
            currentScale = Math.min(maxZoom, currentScale + 0.2);
            updateZoom();
        });
    if (zoomOutBtn)
        zoomOutBtn.addEventListener("click", () => {
            currentScale = Math.max(minZoom, currentScale - 0.2);
            updateZoom();
        });

    slides.forEach((slide) => {
        const img = slide.querySelector("img.zoomable");
        slide.addEventListener("wheel", (e) => {
            e.preventDefault();
            currentScale =
                e.deltaY < 0
                    ? Math.min(maxZoom, currentScale + 0.05)
                    : Math.max(minZoom, currentScale - 0.05);
            img.style.transform = `scale(${currentScale})`;
        });
    });

    function autoZoom() {
        const img = slides[currentIndex].querySelector("img.zoomable");
        currentScale += zoomSpeed * zoomDirection;
        if (currentScale >= maxZoom) zoomDirection = -1;
        if (currentScale <= minZoom) zoomDirection = 1;
        img.style.transform = `scale(${currentScale})`;
        requestAnimationFrame(autoZoom);
    }
    autoZoom();

    if (nextBtn) nextBtn.addEventListener("click", nextSlide);
    if (prevBtn) prevBtn.addEventListener("click", prevSlide);

    // Delegate thumbnail click
    slider.addEventListener("click", (e) => {
        if (e.target.closest(".thumb")) {
            const thumbs = getThumbs();
            const idx = thumbs.indexOf(e.target.closest(".thumb"));
            if (idx !== -1) showSlide(idx);
        }
    });

    slider.addEventListener("mouseenter", () => clearTimeout(slideTimer));
    slider.addEventListener("mouseleave", resetSlideTimer);

    document.addEventListener("keydown", (ev) => {
        if (ev.key === "ArrowRight") nextSlide();
        if (ev.key === "ArrowLeft") prevSlide();
    });

    if (autoplayIndicator) {
        autoplayIndicator.addEventListener("click", () => {
            if (slideTimer) clearTimeout(slideTimer);
            else resetSlideTimer();
        });
    }

    showSlide(0);

    // Stats Counter
    const counters = [
        { id: "stat1", target: 500 },
        { id: "stat2", target: 50 },
        { id: "stat3", target: 3000 },
        { id: "stat4", target: 15 },
    ];
    const duration = 1700;
    let startedStats = false;
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
    function checkStats() {
        if (startedStats) return;
        const section = document.querySelector(".stats-row");
        if (!section) return;
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            counters.forEach((c) => {
                const el = document.getElementById(c.id);
                if (el) animateValue(el, 0, c.target, duration);
            });
            startedStats = true;
        }
    }
    window.addEventListener("scroll", checkStats);
    window.addEventListener("load", checkStats);
    setTimeout(checkStats, 300);
});
