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
            const video = s.querySelector("video");
            if (idx === i) video.play();
            else video.pause();
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

// ===== Stats Counter Script =====
(function () {
    const counters = [
        {
            id: "statEvents",
            target: 200,
        },
        {
            id: "statShots",
            target: 150,
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
        if (rect.top < window.innerHeight) {
            started = true;
            counters.forEach((c) =>
                animateValue(
                    document.getElementById(c.id),
                    0,
                    c.target,
                    duration
                )
            );
        }
    }
    window.addEventListener("scroll", checkStart);
    checkStart();
})();
