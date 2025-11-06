/* === Animated Tech Lines === */
const canvas = document.getElementById("tech-lines");
const ctx = canvas.getContext("2d");
let width, height, points;

function resizeCanvas() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = document.querySelector(".about-hero").offsetHeight;
    points = Array.from(
        {
            length: 50,
        },
        () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * 0.7,
            vy: (Math.random() - 0.5) * 0.7,
        })
    );
}

function draw() {
    ctx.clearRect(0, 0, width, height);
    ctx.fillStyle = "#fff";

    points.forEach((p) => {
        p.x += p.vx;
        p.y += p.vy;
        if (p.x < 0 || p.x > width) p.vx *= -1;
        if (p.y < 0 || p.y > height) p.vy *= -1;
        ctx.beginPath();
        ctx.arc(p.x, p.y, 2, 0, Math.PI * 2);
        ctx.fill();
    });

    ctx.strokeStyle = "rgba(255,255,255,0.2)";
    ctx.lineWidth = 1;

    for (let i = 0; i < points.length; i++) {
        for (let j = i + 1; j < points.length; j++) {
            const dx = points[i].x - points[j].x;
            const dy = points[i].y - points[j].y;
            const dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < 120) {
                ctx.beginPath();
                ctx.moveTo(points[i].x, points[i].y);
                ctx.lineTo(points[j].x, points[j].y);
                ctx.stroke();
            }
        }
    }
    requestAnimationFrame(draw);
}

window.addEventListener("resize", resizeCanvas);
resizeCanvas();
draw();

/* === Counter Animation === */
const counters = document.querySelectorAll(".counter");
const speed = 100;

const animateCounters = () => {
    counters.forEach((counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            const increment = Math.ceil(target / speed);

            if (count < target) {
                counter.innerText = count + increment;
                setTimeout(updateCount, 40);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
};

let countersStarted = false;
window.addEventListener("scroll", () => {
    const section = document.querySelector(".about-company-section");
    const rect = section.getBoundingClientRect();
    if (!countersStarted && rect.top < window.innerHeight - 100) {
        countersStarted = true;
        animateCounters();
    }
});
