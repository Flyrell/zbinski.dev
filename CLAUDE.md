# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Personal portfolio website for Dawid Zbinski (zbinski.dev) with a funny, interactive, game-like design. This is a vanilla web project — no frameworks, no build tools, no package managers.

## Development

Open `index.html` directly in a browser or use any static file server:

```bash
python3 -m http.server 8000
```

## Core Principles

- **Zero dependencies.** Everything is built with vanilla HTML, CSS, and JavaScript. Do not introduce any npm packages, frameworks, or third-party libraries unless explicitly approved by the user.
- **Always start with a plan.** Before implementing any feature, enter plan mode, explore the codebase, and present the approach for approval.
- **Ask when unsure.** If requirements or design direction are unclear, ask the user rather than guessing — especially around visual design, content, and interactions.
- **Optimize aggressively.** Keep bundle size minimal. Prefer CSS over JS for animations/transitions. Avoid abstractions that add weight without clear value.
