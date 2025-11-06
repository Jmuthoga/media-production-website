document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        duration: 1000,
        once: true,
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("multiStepForm");
    const steps = form.querySelectorAll(".form-step");
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((s, i) => {
            s.classList.toggle("d-none", i !== step);
        });
    }

    form.querySelectorAll(".btn-next").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent any default behavior
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    form.querySelectorAll(".btn-prev").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent any default behavior
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    showStep(currentStep);
});
