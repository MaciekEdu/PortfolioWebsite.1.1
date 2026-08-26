document.addEventListener("DOMContentLoaded", () => {

    console.log("Portfolio loaded");


    /*
    ==========================================
    NAVBAR
    ==========================================
    */

    const navbar =
        document.querySelector(".navbar");


    if (navbar) {

        window.addEventListener("scroll", () => {

            if (window.scrollY > 50) {

                navbar.classList.add(
                    "navbar--scrolled"
                );

            } else {

                navbar.classList.remove(
                    "navbar--scrolled"
                );

            }

        });

    }



    /*
    ==========================================
    MOBILE MENU
    ==========================================
    */

    const menuButton =
        document.querySelector(".navbar__menu");

    const navLinks =
        document.querySelector(".navbar__links");


    if (menuButton && navLinks) {

        menuButton.addEventListener(
            "click",
            () => {

                menuButton.classList.toggle(
                    "active"
                );

                navLinks.classList.toggle(
                    "active"
                );

            }
        );


        navLinks
            .querySelectorAll("a")
            .forEach(link => {

                link.addEventListener(
                    "click",
                    () => {

                        menuButton.classList.remove(
                            "active"
                        );

                        navLinks.classList.remove(
                            "active"
                        );

                    }
                );

            });

    }



    /*
    ==========================================
    HERO MOUSE PARALLAX
    ==========================================
    */

    const hero =
        document.querySelector(".hero");


    if (hero) {

        hero.addEventListener(
            "mousemove",
            event => {

                const x =
                    (event.clientX /
                        window.innerWidth) - 0.5;


                const y =
                    (event.clientY /
                        window.innerHeight) - 0.5;


                hero.style.setProperty(
                    "--mouse-x",
                    `${x * 30}px`
                );


                hero.style.setProperty(
                    "--mouse-y",
                    `${y * 30}px`
                );

            }
        );

    }



    /*
    ==========================================
    LOAD DATA
    ==========================================
    */

    loadSkills();

    loadTimeline();

    loadProjects();



    /*
    ==========================================
    SCROLL REVEAL
    ==========================================
    */

    setupScrollReveal();

});



/*
==================================================
SKILLS
==================================================
*/

async function loadSkills() {

    const container =
        document.getElementById(
            "skills-container"
        );


    if (!container) {

        return;

    }


    try {

        const response =
            await fetch(
                "./data/skills.json"
            );


        if (!response.ok) {

            throw new Error(
                `HTTP error: ${response.status}`
            );

        }


        const skills =
            await response.json();


        if (!Array.isArray(skills)) {

            throw new Error(
                "skills.json must contain an array"
            );

        }


        container.innerHTML = "";


        skills.forEach(skill => {

            const element =
                createSkill(skill);

            container.appendChild(
                element
            );

        });


        setupSkillReveal();


    } catch (error) {

        console.error(
            "Could not load skills:",
            error
        );


        container.innerHTML = `

            <div class="skills-error">

                <p>
                    Could not load skills.
                </p>

            </div>

        `;

    }

}



function createSkill(skill) {

    const article =
        document.createElement(
            "article"
        );


    article.classList.add(
        "skill"
    );


    const technologies =
        Array.isArray(
            skill.technologies
        )
            ? skill.technologies
                .map(
                    technology => `
                        <span>
                            ${technology}
                        </span>
                    `
                )
                .join("")
            : "";


    article.innerHTML = `

        <div class="skill__top">

            <span class="skill__number">
                ${skill.number ?? ""}
            </span>

            <span class="skill__category">
                ${skill.category ?? ""}
            </span>

        </div>


        <div class="skill__main">

            <h3 class="skill__name">
                ${skill.name ?? ""}
            </h3>

            <span class="skill__arrow">
                ↗
            </span>

        </div>


        <div class="skill__details">

            <p>
                ${skill.description ?? ""}
            </p>

            <span class="skill__learned">
                ${skill.learned ?? ""}
            </span>

            <div class="skill__technologies">

                ${technologies}

            </div>

        </div>

    `;


    return article;

}



function setupSkillReveal() {

    const skills =
        document.querySelectorAll(
            ".skill"
        );


    if (!skills.length) {

        return;

    }


    const observer =
        createRevealObserver();


    skills.forEach(skill => {

        observer.observe(skill);

    });

}



/*
==================================================
TIMELINE
==================================================
*/

async function loadTimeline() {

    const container =
        document.getElementById(
            "timeline-container"
        );


    if (!container) {

        return;

    }


    try {

        const response =
            await fetch(
                "./data/timeline.json"
            );


        if (!response.ok) {

            throw new Error(
                `HTTP error: ${response.status}`
            );

        }


        const timeline =
            await response.json();


        if (!Array.isArray(timeline)) {

            throw new Error(
                "timeline.json must contain an array"
            );

        }


        container.innerHTML = "";


        timeline.forEach(
            (item, index) => {

                const element =
                    createTimelineItem(
                        item,
                        index
                    );

                container.appendChild(
                    element
                );

            }
        );


        setupTimelineReveal();


    } catch (error) {

        console.error(
            "Could not load timeline:",
            error
        );


        container.innerHTML = `

            <div class="timeline-error">

                Could not load experience.

            </div>

        `;

    }

}



function createTimelineItem(
    item,
    index
) {

    const article =
        document.createElement(
            "article"
        );


    article.classList.add(
        "timeline__item"
    );


    const technologies =
        Array.isArray(
            item.technologies
        )
            ? item.technologies
                .map(
                    technology => `
                        <span>
                            ${technology}
                        </span>
                    `
                )
                .join("")
            : "";


    article.innerHTML = `

        <div class="timeline__dot"></div>


        <div class="timeline__year">

            ${item.year ?? ""}

        </div>


        <div class="timeline__content">

            <p class="timeline__category">

                ${item.category ?? ""}

            </p>


            <h3 class="timeline__title">

                ${item.title ?? ""}

            </h3>


            <p class="timeline__company">

                ${item.company ?? ""}

            </p>


            ${
        item.description
            ? `
                        <p class="timeline__description">

                            ${item.description}

                        </p>
                    `
            : ""
    }


            <div class="timeline__technologies">

                ${technologies}

            </div>

        </div>

    `;


    return article;

}



function setupTimelineReveal() {

    const items =
        document.querySelectorAll(
            ".timeline__item"
        );


    if (!items.length) {

        return;

    }


    const observer =
        createRevealObserver();


    items.forEach(item => {

        observer.observe(item);

    });

}



/*
==================================================
PROJECTS
==================================================
*/

async function loadProjects() {

    const container =
        document.getElementById(
            "projects-container"
        );


    if (!container) {

        return;

    }


    try {

        const response =
            await fetch(
                "./data/projects.json"
            );


        if (!response.ok) {

            throw new Error(
                `HTTP error: ${response.status}`
            );

        }


        const projects =
            await response.json();


        if (!Array.isArray(projects)) {

            throw new Error(
                "projects.json must contain an array"
            );

        }


        container.innerHTML = "";


        projects.forEach(project => {

            const element =
                createProject(project);

            container.appendChild(
                element
            );

        });


        setupProjectReveal();


    } catch (error) {

        console.error(
            "Could not load projects:",
            error
        );


        container.innerHTML = `

            <div class="projects-error">

                <p>
                    Could not load projects.
                </p>

            </div>

        `;

    }

}



function createProject(project) {

    const article =
        document.createElement(
            "article"
        );


    article.classList.add(
        "project"
    );


    const technologies =
        Array.isArray(
            project.technologies
        )
            ? project.technologies
                .map(
                    technology => `
                        <span>
                            ${technology}
                        </span>
                    `
                )
                .join("")
            : "";


    article.innerHTML = `

        <div class="project__number">

            ${project.number ?? ""}

        </div>


        <div class="project__content">

            <p class="project__category">

                ${project.category ?? ""}

            </p>


            <h3 class="project__title">${project.title ?? ""}</h3>
            <p class="project__description">  ${project.description ?? ""} </p>
            <div class="project__technologies">  ${technologies}</div>
            <a href="project.php?id=${encodeURIComponent(project.id ?? "")}"class="project__link" >Bekijk Project <span>↗</span></a>
        </div>
<div class="project__image">
    <img
        src="${project.image}"
        alt="${project.title}"
        class="project__image-img"
    >

    <div class="project__image-overlay"></div>
</div>
    `;


    return article;

}



function setupProjectReveal() {

    const projects =
        document.querySelectorAll(
            ".project"
        );


    if (!projects.length) {

        return;

    }


    const observer =
        createRevealObserver();


    projects.forEach(project => {

        observer.observe(project);

    });

}



/*
==================================================
GENERAL REVEAL
==================================================
*/

function setupScrollReveal() {

    const elements =
        document.querySelectorAll(
            ".reveal"
        );


    if (!elements.length) {

        return;

    }


    const observer =
        createRevealObserver();


    elements.forEach(element => {

        observer.observe(element);

    });

}



/*
==================================================
REVEAL OBSERVER
==================================================
*/

function createRevealObserver() {

    return new IntersectionObserver(
        entries => {

            entries.forEach(entry => {

                if (
                    entry.isIntersecting
                ) {

                    entry.target.classList.add(
                        "visible"
                    );

                } else {

                    entry.target.classList.remove(
                        "visible"
                    );

                }

            });

        },
        {
            threshold: 0.15
        }
    );

}
/* ==================================================
   BACK TO TOP
================================================== */

const backToTop = document.querySelector("#backToTop");

if (backToTop) {

    backToTop.addEventListener("click", function (event) {

        event.preventDefault();

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });

}