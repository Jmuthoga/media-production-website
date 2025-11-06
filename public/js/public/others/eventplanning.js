document.addEventListener("scroll", () => {
    document.querySelectorAll(".reveal").forEach((el) => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100)
            el.classList.add("active");
    });
});

window.addEventListener("scroll", () => {
    const bg = document.querySelector(".parallax-bg");
    if (bg) bg.style.transform = `translateY(${window.scrollY * 0.4}px)`;
});
