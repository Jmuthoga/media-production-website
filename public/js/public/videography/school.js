(function () {
    const slides = document.querySelectorAll("#schoolSlider .slide");
    const thumbs = document.querySelectorAll("#schoolSlider .thumb");
    const next = document.getElementById("nextBtn");
    const prev = document.getElementById("prevBtn");
    let index = 0,
        timer;

    function showSlide(i) {
        slides.forEach((s, j) => s.classList.toggle("active", j === i));
        thumbs.forEach((t, j) => t.classList.toggle("active", j === i));
        index = i;
    }

    function nextSlide() {
        showSlide((index + 1) % slides.length);
    }

    function prevSlide() {
        showSlide((index - 1 + slides.length) % slides.length);
    }

    next.onclick = () => {
        nextSlide();
        resetAuto();
    };
    prev.onclick = () => {
        prevSlide();
        resetAuto();
    };
    thumbs.forEach(
        (t, i) =>
            (t.onclick = () => {
                showSlide(i);
                resetAuto();
            })
    );

    function startAuto() {
        timer = setInterval(nextSlide, 4000);
    }

    function stopAuto() {
        clearInterval(timer);
    }

    function resetAuto() {
        stopAuto();
        startAuto();
    }
    startAuto();
})();

(function () {
    const counters = [
        {
            id: "statEvents",
            target: 150,
        },
        {
            id: "statVideos",
            target: 500,
        },
        {
            id: "statExperience",
            target: 10,
        },
        {
            id: "statSatisfaction",
            target: 99,
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
            else el.textContent = end + (end > 1 ? "+" : "");
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
    setTimeout(checkStart, 300);
})();
