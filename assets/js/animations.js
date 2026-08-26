document.addEventListener("DOMContentLoaded", () => {

    const revealElements =
        document.querySelectorAll(".reveal");
    const observer =
        new IntersectionObserver(
            (entries) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    }
                    else {
                        entry.target.classList.remove("visible");
                    }
                });
            },
            {
                threshold: 0.15
            }
        );
    revealElements.forEach((element) => {
        observer.observe(element);
    });

    const numbers = document.querySelectorAll(".stat__number");
    const numberObserver =
        new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (
                        !entry.isIntersecting
                    ) {

                        return;

                    }

                    const element =
                        entry.target;

                    const target =
                        element.dataset.number;
                    if (target === "∞") {

                        element.textContent = "∞";numberObserver.unobserve(element);
                        return;
                    }

                    const targetNumber = parseInt(target);
                    let current =
                        0;
                    const duration =
                        1000;
                    const startTime = performance.now();
                    function animate(currentTime) {
                        const progress =
                            Math.min((currentTime - startTime) / duration, 1);
                        current = Math.floor(progress * targetNumber);
                        element.textContent =
                            current;
                        if (
                            progress < 1) {
                            requestAnimationFrame(animate);
                        } else {element.textContent = target;
                        }

                    }

                    requestAnimationFrame(animate);numberObserver.unobserve(element);

                });
            },
            {
                threshold: 0.5
            }
        );
    numbers.forEach((number) => {numberObserver.observe(number);
    });

});