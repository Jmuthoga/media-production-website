// Lenis smooth scrolling
const lenis = new Lenis({
    duration: 1.1,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// GSAP + ScrollTrigger
gsap.registerPlugin(ScrollTrigger);
gsap.defaults({
    ease: "power3.out",
    duration: 1,
});

// Hero timeline
const heroTL = gsap.timeline();
heroTL
    .from(".kicker", {
        y: -12,
        autoAlpha: 0,
        duration: 0.6,
    })
    .from(
        ".hero .h1",
        {
            y: 24,
            autoAlpha: 0,
            duration: 1,
        },
        "-=0.2"
    )
    .from(
        ".hero p.lead",
        {
            y: 18,
            autoAlpha: 0,
            duration: 1,
        },
        "-=0.6"
    )
    .from(
        ".actions .btn",
        {
            scale: 0.96,
            autoAlpha: 0,
            stagger: 0.08,
        },
        "-=0.4"
    );

// Mock float
gsap.to('[data-anim="float"]', {
    y: 12,
    yoyo: true,
    repeat: -1,
    duration: 4,
    ease: "sine.inOut",
});
gsap.to('[data-anim="tilt"]', {
    rotation: 3,
    yoyo: true,
    repeat: -1,
    duration: 6,
    ease: "sine.inOut",
});
gsap.to('[data-anim="spin"]', {
    rotation: 6,
    yoyo: true,
    repeat: -1,
    duration: 5,
    ease: "sine.inOut",
});

// Particles idle motion
gsap.to(".particles .p", {
    y: "random(-20,20)",
    x: "random(-40,40)",
    duration: 6,
    repeat: -1,
    yoyo: true,
    stagger: 0.12,
    ease: "sine.inOut",
});

// Reveal sections
gsap.utils.toArray(".section").forEach((sec, i) => {
    gsap.from(sec, {
        autoAlpha: 0,
        y: 40,
        duration: 1,
        delay: i * 0.06,
        scrollTrigger: {
            trigger: sec,
            start: "top 85%",
        },
    });
});

// Services stagger
gsap.utils.toArray(".glass").forEach((el, i) => {
    gsap.from(el, {
        autoAlpha: 0,
        y: 24,
        delay: i * 0.08,
        duration: 0.9,
        scrollTrigger: {
            trigger: el,
            start: "top 92%",
        },
    });
});

// Gallery thumbs
gsap.utils.toArray(".thumb").forEach((el, i) => {
    gsap.from(el, {
        autoAlpha: 0,
        y: 20,
        delay: 0.06 * i,
        duration: 0.8,
        scrollTrigger: {
            trigger: el,
            start: "top 95%",
        },
    });
});

// Workflow track horizontal pan
gsap.to("#workflowTrack", {
    xPercent: -30,
    ease: "none",
    scrollTrigger: {
        trigger: "#workflowTrack",
        scrub: 0.8,
        start: "top 90%",
        end: "bottom top",
    },
});

// Swatch interactivity — change accent overlay
document.querySelectorAll(".swatch").forEach((s) =>
    s.addEventListener("click", () => {
        const css = s.getAttribute("data-color");
        const val = getComputedStyle(document.documentElement)
            .getPropertyValue(css)
            ?.trim();
        if (val) {
            gsap.to("body", {
                background: `linear-gradient(180deg, ${val}10, ${val}05, ${val}02)`,
                duration: 0.8,
            });
        }
    })
);

// CTA form handler
function submitQuote() {
    const name = document.getElementById("qName").value || "Untitled";
    const type = document.getElementById("qType").value;
    gsap.from(".cta-giant", {
        scale: 0.995,
        duration: 0.4,
    });
    alert("Quote requested: " + name + " (" + type + ") — we will follow up.");
}

// Start Project button (modal mock behaviour)
document.getElementById("startProject").addEventListener("click", () => {
    gsap.fromTo(
        ".hero",
        {
            scale: 1,
        },
        {
            scale: 0.998,
            duration: 0.2,
        }
    );
    alert(
        "Thanks — starting a project flow (demo). Please connect via contact page for a real request."
    );
});

// Accessibility: reduce motion
if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    gsap.globalTimeline.clear();
    document.documentElement.classList.add("reduced-motion");
}
