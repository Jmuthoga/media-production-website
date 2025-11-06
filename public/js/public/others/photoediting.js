document.addEventListener("scroll", () => {
    document.querySelectorAll(".reveal").forEach((el) => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add("active");
        }
    });
});

const slider = document.querySelector(".ba-slider");
if (slider) {
    const before = slider.querySelector(".ba-before");
    const after = slider.querySelector(".ba-after");
    const handle = slider.querySelector(".ba-handle");
    let isDragging = false;

    const move = (x) => {
        const rect = slider.getBoundingClientRect();
        let offsetX = x - rect.left;
        offsetX = Math.max(0, Math.min(offsetX, rect.width));
        handle.style.left = offsetX + "px";
        after.style.clipPath = `inset(0 ${rect.width - offsetX}px 0 0)`;
    };

    handle.addEventListener("mousedown", () => (isDragging = true));
    window.addEventListener("mouseup", () => (isDragging = false));
    window.addEventListener("mousemove", (e) => {
        if (isDragging) move(e.clientX);
    });
}

document.addEventListener("scroll", () => {
    document.querySelectorAll(".reveal").forEach((el) => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add("active");
        }
    });
});
