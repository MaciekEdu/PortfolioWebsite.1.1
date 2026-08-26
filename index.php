<!--
Name : M.Urban
Date : 26.08.2026
Portfolio Website
-->

<?php

$pageTitle = "Maciek — Software Developer";

?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($pageTitle) ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/variables.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/navbar.css">
        <link rel="stylesheet" href="assets/css/sections.css">
        <link rel="stylesheet" href="assets/css/animations.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
     <body>
            <!-- NAVIGATION-->
            <header class="navbar">
                <div class="navbar__container">
                    <a href="#home" class="navbar__logo">M.</a>
                    <nav class="navbar__links">
                        <a href="#about">Over mij</a>
                        <a href="#skills">Vaardigheden </a>
                        <a href="#experience">Ervaring</a>
                        <a href="#projects">Projecten </a>
                        <a href="#contact">Contact </a>
                    </nav>
                    <button class="navbar__menu" type="button" aria-label="Open menu" aria-expanded="false"><span> </span> <span> </span>
                    </button>
                </div>
            </header>
            <main>
                <!-- HERO -->
                <section id="home" class="hero">
                    <div class="hero__background">
                        <div class="hero__grid"></div>
                        <div class="hero__glow"></div>
                    </div>
                    <div class="container hero__container">
                        <div class="hero__year">
                            2026
                        </div>
                        <div class="hero__content">
                            <p class="hero__label reveal"> SOFTWARE DEVELOPER</p>
                            <h1 class="hero__title">MACIEK <span> URBAN</span></h1>
                            <p class="hero__description reveal">Ik bouw digitale ervaringen. Ik zet ideeën om in echte, creatieve, persoonlijke en unieke ervaringen.</p>
                            <a href="#projects" class="button hero__button reveal"> Bekijk mijn werk <span>↘</span></a>
                        </div>
                        <div class="scroll-indicator"><span>Scroll</span> <div class="scroll-indicator__line"></div> </div>
                    </div>
                </section>

                <!-- ABOUT -->
                <section id="about" class="section about-section">
                    <div class="container">
                        <div class="section-header reveal"> <p class="section__label"> 01 — OVER MIJ </p>
                            <h2 class="section__title">OVER<span>MIJ</span> </h2>
                        </div>
                        <div class="about-grid">
                            <div class="about-text reveal">
                                <p class="about-intro">Ik ben een  student Software Development met een grote passie voor technologie. Ik vind het geweldig om unieke projecten te bouwen  en te ontdekken hoe technologieën werken. </p>
                                <p>Deze portfoliowebsite is een plek waar ik mijn vaardigheden, ervaringen en projecten kan laten zien. Hier deel ik wat ik heb geleerd, waar ik aan heb gewerkt en welke uitdagingen ik ben aangegaan.</p>
                                <p> Naast programmeren ben ik een creatief en ambitieus persoon die graag een goede balans vindt tussen werken achter de laptop en sporten. Ik houd van vrijwel alles wat met sport te maken heeft. Vooral uitdagingen zoals marathons,
                                    ultramarathons en Ironman wedstrijden spreken mij enorm aan, en ik ben vastbesloten om deze doelen te bereiken</p>
                                <p>Ik ben een doorzetter die altijd op zoek is naar nieuwe uitdagingen. Of het nu gaat om softwareontwikkeling, persoonlijke groei of sportieve prestaties, ik blijf mezelf uitdagen om het beste uit mezelf te halen. </p>
                            </div>
                            <div class="about-side reveal">
                                <div class="about-line"></div>
                                <p>Momenteel volg ik de opleiding Software Development en werk ik continu aan het ontwikkelen van mijn vaardigheden via school, persoonlijke projecten en praktijkervaring.</p>
                            </div>
                      </div>
                        <div class="about-stats reveal">
                            <div class="stat"> <span class="stat__number"> 2021 </span> <span class="stat__label">Gestart met werken</span> </div>
                            <div class="stat"> <span class="stat__number">MBO 4</span> <span class="stat__label">Software Development</span> </div>
                            <div class="stat"> <span class="stat__number"> ∞ </span> <span class="stat__label">blijven leren</span> </div>
                        </div>
                    </div>
                </section>

                <!--  SKILLS -->

                <section id="skills" class="section skills-section">
                    <div class="container">
                        <div class="section-header reveal">
                            <p class="section__label"> 02 - Vaardigheden</p>
                            <h2 class="section__title"> WAARMEE<span>IK WERK.</span>
                            </h2>
                        </div>
                        <div id="skills-container" class="skills-grid"></div>
                    </div>
                </section>

                <!-- EXPERIENCE-->
                <section id="experience" class="section section--experience" >
                    <div class="container">
                        <div class="section-header reveal">
                            <p class="section__label"> 03 — Ervaring </p>
                            <h2 class="section__title"> MIJN.<span> Ervaring.</span>
                            </h2>
                        </div>
                        <div id="timeline-container" class="timeline">
                        </div>
                    </div>
                </section>

                <!-- PROJECTS -->
                <section id="projects" class="section section--projects">
                    <div class="container">
                        <div class="section-header reveal">
                            <p class="section__label"> 04 — Projecten</p>
                            <h2 class="section__title">MIJN<span>PROJECTEN</span> </h2>
                        </div>
                        <div id="projects-container" class="projects-list"></div>
                    </div>
                </section>

                <!-- CONTACT -->
                <section id="contact" class="section contact-section">
                    <div class="container">
                        <div class="contact-section__header reveal">
                            <p class="section__label">05 — Contact</p>
                            <h2 class="contact-section__title">NEEM<span>CONTACT</span> </h2>
                            <p class="contact-section__description"> Hier kan je contact met mijn opnemen!</p>
                        </div>
                        <div class="contact-section__content reveal">
                            <a href="mailto:maciek.urban10@gmail.com" class="contact-section__email">
                                <span> maciek.urban10@gmail.com</span>
                                <span class="contact-section__arrow"> ↗ </span>
                            </a>
                            <div class="contact-section__links">
                                <a href="https://github.com/MaciekEdu" target="_blank" rel="noopener noreferrer">GitHub ↗</a>
                                <a href="https://linkedin.com/in/maciek-urban-63b645369" target="_blank" rel="noopener noreferrer">LinkedIn ↗</a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- FOOTER -->
            <footer class="footer">

                <div class="container">
                    <div class="footer__top">
                        <div class="footer__brand">
                            <a href="#home" class="footer__logo"> M. </a>
                            <p>Software Developer</p>
                        </div>
                        <a href="#home" class="footer__top-link"> Naar Boven ↑ </a>
                    </div>
                    <div class="footer__bottom">
                        <p>© <?= date('Y') ?> Maciek Urban</p>
                        <p> Gemaakt met PHP, JavaScript, HTML & CSS.</p>
                    </div>
                </div>

            </footer>
            <script src="assets/js/main.js" defer></script>
     </body>
</html>