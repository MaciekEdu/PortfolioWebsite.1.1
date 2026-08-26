<?php
$projectsFile = __DIR__ . '/data/projects.json';

if (!file_exists($projectsFile)) {
    die('Project is niet gevonden');
}

$json = file_get_contents($projectsFile);

$projects = json_decode($json, true);

if (!is_array($projects)) {
    die('Data van project is niet gevonden.');
}

$projectId = $_GET['id'] ?? null;

$project = null;

foreach ($projects as $item) {

    if (
        isset($item['id']) &&
        $item['id'] === $projectId
    ) {

        $project = $item;
        break;

    }

}

if ($project === null) {

    http_response_code(404);

    $pageTitle = 'Project niet gevonden';

} else {
    $pageTitle =
        ($project['title'] ?? 'Project')
        . ' — Maciek Urban';
}
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?= htmlspecialchars($pageTitle) ?> </title>
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
        <link rel="stylesheet" href="assets/css/project.css">
    </head>
        <body>
        <!-- NAVIGATION -->
        <header class="navbar">
            <div class="navbar__container">
                <a href="index.php" class="navbar__logo"> M.</a>
                <nav class="navbar__links">
                    <a href="index.php#about">Over mij</a>
                    <a href="index.php#skills">Vaardigheden</a>
                    <a href="index.php#experience">Ervaring</a>
                    <a href="index.php#projects">Projecten</a>
                    <a href="index.php#contact">Contact</a>
                </nav>
                <button class="navbar__menu" type="button" aria-label="Open menu">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </header>
        <main>
            <?php if ($project === null): ?>
                <section class="project-page project-page--error">
                    <div class="container">
                        <p class="project-page__label">404 — PROJECT NIET GEVONDEN</p>
                        <h1 class="project-page__error-title">DEZE PROJECT<span>BESTAAT NIET.</span></h1>
                        <p class="project-page__description">Het project dat je zoekt kon niet worden gevonden..</p>
                        <a href="index.php#projects" class="button">← Terug naar projecten</a>
                    </div>
                </section>
            <?php else: ?>
                <!-- pROJECT HERO -->
                <section class="project-page">
                    <div class="container">
                        <a href="index.php#projects" class="project-page__back">← Terug naar projecten</a>
                        <div class="project-page__hero">
                            <div class="project-page__meta">
                            <span><?= htmlspecialchars($project['number'] ?? '') ?></span>
                                <span><?= htmlspecialchars($project['category'] ?? '') ?></span>
                            </div>
                            <h1 class="project-page__title"><?= htmlspecialchars($project['title'] ?? '') ?></h1>
                            <p class="project-page__intro"><?= htmlspecialchars($project['description'] ?? '') ?></p>
                        </div>
                        <!--  PROJECT IMAGE -->
                        <div class="project-page__image"><?php $image = $project['image'] ?? ''; ?>
                            <?php if (!empty($image) && file_exists(__DIR__ . '/' . $image)): ?>
                                <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($project['title'] ?? 'Project') ?>">
                            <?php else: ?>
                                <div class="project-page__placeholder">
                                    <span><?= htmlspecialchars($project['number'] ?? '') ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- PROJECT INFORMATION -->
                        <div class="project-page__grid">
                            <div class="project-page__main">
                                <p class="project-page__label">OVER HET PROJECT</p>
                                <h2>HET IDEE<span>ERACHTER.</span></h2>
                                <p class="project-page__text"><?= nl2br(htmlspecialchars($project['long_description'] ?? '')) ?></p>
                            </div>
                            <aside class="project-page__sidebar">
                                <!-- Technologies -->
                                <div class="project-info">
                                    <p class="project-info__label">TECHNOLOGIEËN</p>
                                    <div class="project-info__tags">
                                        <?php if (!empty($project['technologies'])): ?>
                                            <?php foreach ($project['technologies'] as $technology): ?> <span> <?= htmlspecialchars($technology) ?></span>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="project-info">
                                    <p class="project-info__label">STATUS</p>
                                    <p class="project-info__value"> <?= htmlspecialchars($project['status'] ?? 'Unknown') ?></p>
                                </div>
                                <!-- Links -->
                                <?php if (!empty($project['github']) || !empty($project['website'])): ?>
                                    <div class="project-info">
                                        <p class="project-info__label">LINKS</p>
                                        <div class="project-info__links">
                                            <?php if (!empty($project['github'])): ?>
                                                <a href="<?= htmlspecialchars($project['github']) ?>" target="_blank" rel="noopener noreferrer"> GitHub ↗</a>
                                            <?php endif; ?>
                                            <?php if (!empty($project['website'])): ?>
                                                <a href="<?= htmlspecialchars($project['website']) ?>" target="_blank" rel="noopener noreferrer"> Website ↗ </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </aside>
                        </div>
                        <!-- BACK TO PROJECTS -->
                        <div class="project-page__bottom">
                            <a href="index.php#projects" class="button"> ← Alle projecten</a>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </main>
        <!-- FOOTER-->
        <footer class="footer">
            <div class="container footer__container">
                <div class="footer__left">
                    <span class="footer__logo"> M.</span>
                    <p> Software Developer </p>
                </div>
                <div class="footer__right">
                    <a href="index.php"> Home </a><span>© 2026 Maciek Urban </span>
                </div>
            </div>
        </footer>
        <script src="assets/js/main.js" defer></script>
    </body>

</html>