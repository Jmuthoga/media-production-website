/* ---------- Canvas Tech Lines (hero) ---------- */
(function () {
    const canvas = document.getElementById("training-tech-canvas");
    if (!canvas) return;
    const ctx = canvas.getContext("2d");
    let W = (canvas.width = window.innerWidth);
    let H = (canvas.height =
        document.querySelector(".training-hero").offsetHeight);
    const POINTS = 48;
    let points = [];

    function initPoints() {
        points = Array.from(
            {
                length: POINTS,
            },
            () => ({
                x: Math.random() * W,
                y: Math.random() * H,
                vx: (Math.random() - 0.5) * 0.6,
                vy: (Math.random() - 0.5) * 0.6,
            })
        );
    }

    function resize() {
        W = canvas.width = window.innerWidth;
        H = canvas.height =
            document.querySelector(".training-hero").offsetHeight;
        initPoints();
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        ctx.fillStyle = "rgba(255,255,255,0.9)";
        points.forEach((p) => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0 || p.x > W) p.vx *= -1;
            if (p.y < 0 || p.y > H) p.vy *= -1;
            ctx.beginPath();
            ctx.arc(p.x, p.y, 1.5, 0, Math.PI * 2);
            ctx.fill();
        });
        ctx.strokeStyle = "rgba(255,255,255,0.12)";
        ctx.lineWidth = 1;
        for (let i = 0; i < POINTS; i++) {
            for (let j = i + 1; j < POINTS; j++) {
                const dx = points[i].x - points[j].x;
                const dy = points[i].y - points[j].y;
                const d = Math.sqrt(dx * dx + dy * dy);
                if (d < 110) {
                    ctx.globalAlpha = 1 - d / 110;
                    ctx.beginPath();
                    ctx.moveTo(points[i].x, points[i].y);
                    ctx.lineTo(points[j].x, points[j].y);
                    ctx.stroke();
                }
            }
        }
        ctx.globalAlpha = 1;
        requestAnimationFrame(draw);
    }
    window.addEventListener("resize", resize);
    resize();
    draw();
})();

/* ---------- Counters (on scroll) ---------- */
(function () {
    const nums = document.querySelectorAll(".num");
    let started = false;

    function animate() {
        nums.forEach((el) => {
            const target = +el.getAttribute("data-target") || 0;
            const start = +el.textContent || 0;
            const dur = 1200;
            const t0 = performance.now();

            function step(ts) {
                const p = Math.min(1, (ts - t0) / dur);
                el.textContent = Math.floor(
                    start + (target - start) * p
                ).toLocaleString();
                if (p < 1) requestAnimationFrame(step);
                else el.textContent = target.toLocaleString();
            }
            requestAnimationFrame(step);
        });
    }

    function onScroll() {
        if (started) return;
        const el = document.querySelector(".counters");
        if (!el) return;
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            started = true;
            animate();
            window.removeEventListener("scroll", onScroll);
        }
    }
    window.addEventListener("scroll", onScroll);
    setTimeout(onScroll, 300);
})();

/* ---------- Gallery lightbox ---------- */
(function () {
    const items = Array.from(document.querySelectorAll(".gallery-item"));
    const lightbox = document.getElementById("lightbox");
    const lbImg = document.getElementById("lightboxImage");
    const lbClose = document.getElementById("lightboxClose");

    function open(src, alt) {
        lbImg.src = src;
        lbImg.alt = alt || "Image";
        lightbox.classList.add("open");
        lightbox.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
        lbClose.focus();
    }

    function close() {
        lightbox.classList.remove("open");
        lightbox.setAttribute("aria-hidden", "true");
        lbImg.src = "";
        document.body.style.overflow = "";
    }

    items.forEach((it) => {
        it.addEventListener("click", () =>
            open(it.dataset.full, it.querySelector("img").alt)
        );
        it.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                open(it.dataset.full);
            }
        });
    });
    lbClose.addEventListener("click", close);
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) close();
    });
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") close();
    });
})();

/* ---------- Accordion toggle for FAQ ---------- */
(function () {
    const toggles = Array.from(
        document.querySelectorAll('[data-toggle="collapse"]')
    );
    toggles.forEach((btn) => {
        const target = document.querySelector(btn.dataset.target);
        btn.addEventListener("click", (e) => {
            const expanded = btn.getAttribute("aria-expanded") === "true";
            btn.setAttribute("aria-expanded", String(!expanded));
            if (target) {
                if (expanded) target.style.display = "none";
                else target.style.display = "block";
            }
        });
        // initialize collapsed
        const targetInit = document.querySelector(btn.dataset.target);
        if (targetInit && btn.classList.contains("collapsed"))
            targetInit.style.display = "none";
    });
})();

/* ---------- Unmute video logic (autoplay policy compliant) ---------- */
(function () {
    const unmuteBtn = document.getElementById("unmuteVideo");
    if (!unmuteBtn) return;
    unmuteBtn.addEventListener("click", () => {
        const iframe = document.getElementById("trainingVideo");
        if (!iframe) return;
        // swap mute=1 to mute=0 to unmute (reload permitted due to user gesture)
        iframe.src = iframe.src.replace("mute=1", "mute=0");
        unmuteBtn.style.display = "none";
    });
    // hero video unmute
    const unmuteHero = document.getElementById("unmuteHeroBtn");
    if (unmuteHero) {
        unmuteHero.addEventListener("click", () => {
            const iframe = document.getElementById("heroVideo");
            if (!iframe) return;
            iframe.src = iframe.src.replace("mute=1", "mute=0");
            unmuteHero.style.display = "none";
        });
    }
})();

/* ---------- Small enhancements: form submission (no AJAX) ---------- */
(function () {
    const form = document.getElementById("interestForm");
    if (!form) return;
    form.addEventListener("submit", (e) => {
        // allow default submission to server-side route; optionally show small UI
        const btn = form.querySelector('button[type="submit"]');
        if (btn) {
            btn.textContent = "Sending...";
            btn.disabled = true;
        }
    });
})();

document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter-num");
    const speed = 200;
    counters.forEach((counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            const increment = target / speed;
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });

    // Unmute button logic
    document
        .getElementById("unmuteVideo")
        .addEventListener("click", function () {
            const iframe = document.getElementById("trainingVideo");
            iframe.src = iframe.src.replace("mute=1", "mute=0");
            this.style.display = "none";
        });
});
