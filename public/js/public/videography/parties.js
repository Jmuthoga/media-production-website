(function () {
    const slides = document.querySelectorAll("#videoSlider .slide");
    const thumbs = document.querySelectorAll("#videoSlider .thumb");
    const next = document.getElementById("nextBtn");
    const prev = document.getElementById("prevBtn");
    const indicator = document.getElementById("autoplayIndicator");
    let i = 0,
        auto = true,
        timer;

    function show(n) {
        if (n < 0) n = slides.length - 1;
        if (n >= slides.length) n = 0;
        slides.forEach((s, j) => s.classList.toggle("active", j === n));
        thumbs.forEach((t, j) => t.classList.toggle("active", j === n));
        i = n;
    }

    function nextSlide() {
        show(i + 1);
    }

    function prevSlide() {
        show(i - 1);
    }

    function start() {
        timer = setInterval(nextSlide, 4000);
        indicator.textContent = "Auto • On";
    }

    function stop() {
        clearInterval(timer);
        indicator.textContent = "Auto • Off";
    }

    next.onclick = () => {
        nextSlide();
        stop();
    };
    prev.onclick = () => {
        prevSlide();
        stop();
    };
    thumbs.forEach(
        (t, idx) =>
            (t.onclick = () => {
                show(idx);
                stop();
            })
    );
    start();
    indicator.onclick = () => {
        auto = !auto;
        auto ? start() : stop();
    };
})();

(function () {
    const counters = [
        {
            id: "statClients",
            target: 600,
        },
        {
            id: "statEvents",
            target: 250,
        },
        {
            id: "statVideos",
            target: 500,
        },
        {
            id: "statYears",
            target: 10,
        },
    ];

    function animate(el, end) {
        let s = 0,
            d = 1500,
            st = null;

        function step(t) {
            if (!st) st = t;
            let p = Math.min((t - st) / d, 1);
            el.textContent = Math.floor(p * end) + "+";
            if (p < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    window.addEventListener("scroll", () => {
        counters.forEach((c) => {
            const e = document.getElementById(c.id);
            if (
                e &&
                e.getBoundingClientRect().top < window.innerHeight - 80 &&
                !e.dataset.done
            ) {
                e.dataset.done = true;
                animate(e, c.target);
            }
        });
    });
})();
