(function () {
    const slider = document.getElementById("corpSlider");
    const slides = slider.querySelectorAll(".slide");
    const thumbs = slider.querySelectorAll(".thumb");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    let index = 0;
    let timer;

    function showSlide(i) {
        slides.forEach((s, idx) => {
            s.classList.toggle("active", idx === i);
            thumbs[idx].classList.toggle("active", idx === i);
        });
        index = i;
    }

    function next() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }

    function prev() {
        index = (index - 1 + slides.length) % slides.length;
        showSlide(index);
    }

    nextBtn.onclick = () => {
        next();
        resetAuto();
    };
    prevBtn.onclick = () => {
        prev();
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
        timer = setInterval(next, 4000);
    }

    function stopAuto() {
        clearInterval(timer);
    }

    function resetAuto() {
        stopAuto();
        startAuto();
    }

    slider.onmouseenter = stopAuto;
    slider.onmouseleave = startAuto;
    startAuto();
})();

(function () {
    const counters = [
        {
            id: "statEvents",
            target: 200,
        },
        {
            id: "statShots",
            target: 10000,
        },
        {
            id: "statExperience",
            target: 12,
        },
        {
            id: "statSatisfaction",
            target: 98,
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
