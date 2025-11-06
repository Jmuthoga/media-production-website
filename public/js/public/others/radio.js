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

gsap.registerPlugin(ScrollTrigger);
gsap.utils
    .toArray(".services-section, .hero-section, .cta-section")
    .forEach((sec, i) => {
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
