<?php

$version = '1.0.0';

?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?= $version; ?>">

    <!-- Basics -->
    <title>Dawid Zbi&#x144;ski // Developer by default</title>
    <meta name="description"
          content="Portfolio of Dawid Zbinski, Frontend Engineering Lead. Built as an interactive game menu experience.">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="Dawid Zbi&#x144;ski // Developer by default">
    <meta name="twitter:description"
          content="Portfolio of Dawid Zbinski, Frontend Engineering Lead. Built as an interactive game menu experience.">

    <!-- Open Graph data -->
    <meta property="og:title" content="Dawid Zbi&#x144;ski // Developer by default">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://zbinski.dev/">
    <meta property="og:description"
          content="Portfolio of Dawid Zbinski, Frontend Engineering Lead. Built as an interactive game menu experience.">
    <meta property="og:site_name" content="Dawid Zbi&#x144;ski // Developer by default">
    <meta property="fb:admins" content="100000585915135">
    <meta property="og:image" content="https://zbinski.dev/assets/images/og-image.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- Google Consent Mode v2 — defaults BEFORE GTM -->
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', {
        'analytics_storage': 'denied',
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'wait_for_update': 500
    });
    </script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MCQ3DZZ8');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCQ3DZZ8"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<canvas id="particles" aria-hidden="true"></canvas>
<div id="noise" aria-hidden="true"></div>

<div class="settings" role="toolbar" aria-label="Settings">
    <button id="btn-theme" type="button" aria-label="Toggle light/dark theme" title="Toggle theme">
        <svg class="icon-sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"/>
            <line x1="12" y1="1" x2="12" y2="3"/>
            <line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/>
            <line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
        </svg>
        <svg class="icon-moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
    </button>
    <button id="btn-sound" type="button" aria-label="Toggle sound effects" title="Toggle sound">
        <svg class="icon-sound-on" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14"/>
            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"/>
        </svg>
        <svg class="icon-sound-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
            <line x1="23" y1="9" x2="17" y2="15"/>
            <line x1="17" y1="9" x2="23" y2="15"/>
        </svg>
    </button>
</div>

<div id="page-wrap">
    <!-- MAIN MENU -->
    <section id="screen-main" class="screen active" aria-label="Main menu">
        <div class="screen-inner main-layout">
            <header class="main-header">
                <h1 class="title">Dawid Zbinski</h1>
                <p class="subtitle">Frontend Engineering Lead</p>
                <div class="contact-links">
                    <a href="mailto:dawid@zbinski.dev" aria-label="Email dawid@zbinski.dev">dawid@zbinski.dev</a>
                    <a href="https://github.com/flyrell" target="_blank" rel="noopener noreferrer"
                       aria-label="GitHub profile">GitHub</a>
                    <a href="https://www.linkedin.com/in/dawidzbinski/" target="_blank" rel="noopener noreferrer"
                       aria-label="LinkedIn profile">LinkedIn</a>
                    <a href="https://x.com/davezbinski" target="_blank" rel="noopener noreferrer"
                       aria-label="X profile">X</a>
                </div>
            </header>

            <nav class="menu" role="menu" aria-label="Main navigation">
                <button class="menu-item focused" role="menuitem" data-screen="screen-singleplayer">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Singleplayer <span class="menu-hint">(Freelance)</span></span>
                    <span class="menu-item-desc">Freelance quests and side projects I've shipped solo.</span>
                </button>
                <button class="menu-item" role="menuitem" data-screen="screen-multiplayer">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Multiplayer <span class="menu-hint">(Career)</span></span>
                    <span class="menu-item-desc">The career timeline — every team I've been part of.</span>
                </button>
                <button class="menu-item" role="menuitem" data-screen="screen-credits">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Credits <span class="menu-hint">(Open Source)</span></span>
                    <span class="menu-item-desc">Open source contributions and community achievements.</span>
                </button>
                <button class="menu-item" role="menuitem" data-screen="screen-upcoming">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Upcoming</span>
                    <span class="menu-item-desc">Projects currently in development — stay tuned.</span>
                </button>
                <button class="menu-item" role="menuitem" data-screen="screen-blog">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Blog</span>
                    <span class="menu-item-desc">Random no filter dev thoughts & news.</span>
                </button>
                <button class="menu-item" role="menuitem" data-action="cv">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Player Stats <span class="menu-hint">(CV)</span></span>
                    <span class="menu-item-desc">My stats, skills, and achievements — in PDF form.</span>
                </button>
                <button class="menu-item" role="menuitem" data-action="exit">
                    <span class="cursor" aria-hidden="true">&#9654;</span>
                    <span class="label">Exit Game</span>
                    <span class="menu-item-desc">Shut it all down. CRT style.</span>
                </button>
            </nav>

            <footer class="keyboard-hints">
                <span><kbd>&#8593;</kbd><kbd>&#8595;</kbd> Navigate</span>
                <span><kbd>Enter</kbd> Select</span>
                <span><kbd>Esc</kbd> Back</span>
            </footer>
        </div>
    </section>

    <!-- SINGLEPLAYER (Freelance) -->
    <section id="screen-singleplayer" class="screen" aria-label="Singleplayer — Freelance projects">
        <div class="screen-inner">
            <button class="back-btn" type="button" aria-label="Back to main menu">
                <span aria-hidden="true">&#9664;</span> Back
            </button>
            <h2 class="screen-title">Singleplayer</h2>
            <p class="screen-subtitle">Freelance quests completed solo</p>
            <div class="quest-grid">
                <article class="quest-card">
                    <h3>3D Configurators</h3>
                    <p>Proprietary Three.js software for interactive product configuration. Custom model loading
                        pipeline with real-time hot-swapping, material editing, and dynamic camera controls.</p>
                    <span class="quest-tag">Three.js</span>
                    <span class="quest-tag">WebGL</span>
                </article>
                <article class="quest-card">
                    <h3>360&deg; Virtual Showrooms</h3>
                    <p>Modern Marzipano wrapper delivering immersive 360&deg; environments with VR support, spatial
                        audio, interactive hotspots, and seamless transitions between scenes.</p>
                    <span class="quest-tag">Marzipano</span>
                    <span class="quest-tag">WebVR</span>
                </article>
                <article class="quest-card">
                    <h3>Image-processing 3D Model Illusion</h3>
                    <p>Transforms standard photographs into convincing 3D-like visuals using depth maps, parallax
                        layering, and GPU-accelerated image processing in the browser.</p>
                    <span class="quest-tag">Canvas</span>
                    <span class="quest-tag">WebGL</span>
                </article>
                <article class="quest-card">
                    <h3>Paywalled REST API Framework</h3>
                    <p>Node.js + Express framework for building paywalled APIs. Handles authentication, subscription
                        tiers, rate limiting, and automated billing integration.</p>
                    <span class="quest-tag">Node.js</span>
                    <span class="quest-tag">Express</span>
                </article>
            </div>
        </div>
    </section>

    <!-- MULTIPLAYER (Career) -->
    <section id="screen-multiplayer" class="screen" aria-label="Multiplayer — Career timeline">
        <div class="screen-inner">
            <button class="back-btn" type="button" aria-label="Back to main menu">
                <span aria-hidden="true">&#9664;</span> Back
            </button>
            <h2 class="screen-title">Multiplayer</h2>
            <p class="screen-subtitle">Career co-op timeline</p>
            <div class="timeline">
                <article class="timeline-entry">
                    <span class="timeline-date">April 2025 &mdash; Present</span>
                    <h3>Frontend Engineering Lead</h3>
                    <p class="timeline-company">Aristone</p>
                    <p>Leading a team of fullstack engineers building visually polished, highly functional mobile and
                        web school &amp; learning management systems. Working closely with business and designers to set
                        new standards and deliver solutions that create meaningful change in the education industry.</p>
                    <span class="quest-tag">React Native</span>
                    <span class="quest-tag">Tailwind</span>
                    <span class="quest-tag">React</span>
                    <span class="quest-tag">Node.js</span>
                    <span class="quest-tag">Nest.js</span>
                    <span class="quest-tag">Golang</span>
                    <span class="quest-tag">AWS</span>
                </article>
                <article class="timeline-entry">
                    <span class="timeline-date">April 2024 &mdash; March 2025</span>
                    <h3>Senior Software Engineer</h3>
                    <p class="timeline-company">IP Fabric</p>
                    <p>Contributed to the backend development of IP Fabric's network assurance platform, focusing on
                        core functionality and the public API. Designed and implemented scalable, high-quality solutions
                        using Node.js, ensuring seamless integration with client systems and supporting the platform's
                        mission to redefine network automation in enterprise environments.</p>
                    <span class="quest-tag">Node.js</span>
                    <span class="quest-tag">Express</span>
                    <span class="quest-tag">React</span>
                    <span class="quest-tag">WebSockets</span>
                </article>
                <article class="timeline-entry">
                    <span class="timeline-date">September 2021 &mdash; March 2024</span>
                    <h3>Senior Software Engineer</h3>
                    <p class="timeline-company">Betsys</p>
                    <p>Delivered a high-quality backoffice application with strong test coverage, e2e tests, strict code
                        standards, and minimal technical debt. After the company's restructuring, took on
                        security-critical work including document verification logic and a new Login API spread across
                        the entire ecosystem with improved security standards and better scaling.</p>
                    <span class="quest-tag">Node.js</span>
                    <span class="quest-tag">Nest.js</span>
                    <span class="quest-tag">Angular</span>
                    <span class="quest-tag">PostgreSQL</span>
                    <span class="quest-tag">WebSockets</span>
                    <span class="quest-tag">SSE</span>
                </article>
                <article class="timeline-entry">
                    <span class="timeline-date">October 2019 &mdash; July 2021</span>
                    <h3>Senior Software Engineer</h3>
                    <p class="timeline-company">Drivvn</p>
                    <p>Created and maintained core applications for automotive projects running on Drivvn software. Our
                        biggest client, the PSA Group, was expanding e-commerce services to Italy, France, Spain, and
                        the UK — creating major challenges in software architecture and scalability.</p>
                    <span class="quest-tag">PHP</span>
                    <span class="quest-tag">Symfony</span>
                    <span class="quest-tag">React</span>
                </article>
                <article class="timeline-entry">
                    <span class="timeline-date">January 2017 &mdash; July 2019</span>
                    <h3>Web Developer</h3>
                    <p class="timeline-company">Bistro.sk</p>
                    <p>Reworked most frontend and backend services, migrating from a legacy proprietary framework to a
                        standard REST API built on Symfony. Led the frontend transition to Vue.js — achieved gradually
                        using Web Components — and set up CI/CD pipelines and Docker across the project.</p>
                    <span class="quest-tag">PHP</span>
                    <span class="quest-tag">Symfony</span>
                    <span class="quest-tag">Vue.js</span>
                    <span class="quest-tag">Docker</span>
                </article>
            </div>
        </div>
    </section>

    <!-- CREDITS (Open Source) -->
    <section id="screen-credits" class="screen" aria-label="Credits — Open source">
        <div class="screen-inner">
            <button class="back-btn" type="button" aria-label="Back to main menu">
                <span aria-hidden="true">&#9664;</span> Back
            </button>
            <h2 class="screen-title">Credits</h2>
            <p class="screen-subtitle">Open source achievements unlocked</p>
            <div class="credits-grid">
                <article class="credit-card">
                    <h3>axios-auth-refresh</h3>
                    <p>Automatic token-refresh plugin for Axios. Intercepts 401 responses, queues failed requests,
                        refreshes OAuth tokens, and retries them seamlessly.</p>
                    <a href="https://github.com/Flyrell/axios-auth-refresh" target="_blank" rel="noopener noreferrer"
                       class="credit-link">View on GitHub &rarr;</a>
                </article>
                <article class="credit-card">
                    <h3>html-attribute-folder</h3>
                    <p>IntelliJ IDE plugin for collapsing verbose HTML attributes. Reduces visual clutter in
                        template-heavy files with one-click folding.</p>
                    <a href="https://github.com/flyrell/html-attribute-folder" target="_blank"
                       rel="noopener noreferrer" class="credit-link">View on GitHub &rarr;</a>
                </article>
                <article class="credit-card">
                    <h3>Image Processing in JS</h3>
                    <p>Tech talks and companion libraries exploring real-time image manipulation in the browser using
                        Canvas and WebGL.</p>
                    <a href="https://www.youtube.com/watch?v=NZsi5E_uhTY" target="_blank" rel="noopener noreferrer" class="credit-link">View
                        on YouTube &rarr;</a>
                </article>
            </div>
        </div>
    </section>

    <!-- UPCOMING -->
    <section id="screen-upcoming" class="screen" aria-label="Upcoming — In development">
        <div class="screen-inner">
            <button class="back-btn" type="button" aria-label="Back to main menu">
                <span aria-hidden="true">&#9664;</span> Back
            </button>
            <h2 class="screen-title">Upcoming</h2>
            <p class="screen-subtitle">Currently in development</p>
            <div class="upcoming-grid">
                <article class="upcoming-card">
                    <h3>Layiso</h3>
                    <p>macOS screen recording with multi-stream support. Capture individual windows, audio sources, and
                        camera feeds as separate layers, then composite in post. Built with Swift and AVFoundation.</p>
                    <div class="loading-bar" aria-label="Development progress">
                        <div class="loading-fill" style="--progress: 65%"></div>
                    </div>
                    <span class="loading-label">Almost Beta — 65%</span>
                </article>
                <article class="upcoming-card">
                    <h3>Hour Git</h3>
                    <p>Automatic time-tracking powered by git analysis. Parses commit history, branch activity, and work
                        patterns to generate accurate timesheets — no manual input needed.</p>
                    <div class="loading-bar" aria-label="Development progress">
                        <div class="loading-fill" style="--progress: 20%"></div>
                    </div>
                    <span class="loading-label">Early Development — 20%</span>
                </article>
            </div>
        </div>
    </section>

    <!-- BLOG -->
    <section id="screen-blog" class="screen" aria-label="Blog">
        <div class="screen-inner">
            <button class="back-btn" type="button" aria-label="Back to main menu">
                <span aria-hidden="true">&#9664;</span> Back
            </button>
            <h2 class="screen-title">Blog</h2>
            <article class="blog-post">
                <h3 class="blog-post-title">Why I Still Build Without Frameworks</h3>
                <time class="blog-date" datetime="2026-01-15">January 15, 2026</time>
                <div class="blog-body">
                    <p>Every few months someone asks me why this portfolio isn't built with React, Next, Astro, or
                        whatever the current darling is. The answer is embarrassingly simple: I don't need one.</p>
                    <p>A framework is a trade. You get structure, conventions, and ecosystem in exchange for weight,
                        opinions, and update anxiety. For a marketing site, a portfolio, or anything where the "app" is
                        really just a document with some flair — that trade is upside down.</p>
                    <p>Vanilla HTML, CSS, and JS have gotten shockingly good. CSS custom properties replace most of what
                        Sass gave us. The Web Animations API covers what jQuery once did. ES modules mean you can
                        organize code without Webpack. And the browser's built-in component model (<code>&lt;template&gt;</code>,
                        <code>&lt;slot&gt;</code>, custom elements) handles composition for anything more complex.</p>
                    <p>The result? This site loads in under 50KB. There's no hydration step. No client-side router
                        fighting the browser. No node_modules. It works with JavaScript disabled (mostly). And when I
                        come back to it in two years, there's nothing to update — no breaking changes, no deprecated
                        APIs, no abandoned plugins.</p>
                    <p>I'm not anti-framework. I use them at work every day. But reaching for one by default, before
                        you've felt the actual pain it solves, is cargo culting. Build the simplest thing that works.
                        Add complexity only when you've earned the need for it.</p>
                    <p>The web platform is the framework. Everything else is optional.</p>
                </div>
            </article>
        </div>
    </section>
</div>

<div id="crt-overlay" aria-hidden="true">
    <p class="crt-message">Thanks for playing.</p>
</div>

<div id="consent-banner" class="consent-banner" role="dialog" aria-label="Cookie consent">
    <p class="consent-text">I want to know that you were here and what you did here. Do you consent with that?</p>
    <div class="consent-actions">
        <button id="consent-no" type="button">No</button>
        <button id="consent-yes" type="button">Yes</button>
    </div>
</div>

<script src="script.js?v=<?= $version; ?>"></script>
</body>
</html>
