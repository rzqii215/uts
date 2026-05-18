<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Rizqi Portfolio') }}</title>

    @livewireStyles

    <script>
        (function () {
            const savedTheme = localStorage.getItem('portfolio-theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>

    <style>
        :root {
            --bg: #fbfaf7;
            --bg-soft: #f3f0e9;
            --card: rgba(255, 255, 255, 0.88);
            --card-solid: #ffffff;
            --text: #111318;
            --text-soft: #3d4351;
            --muted: #707786;
            --border: rgba(17, 19, 24, 0.10);
            --accent: #f5b400;
            --accent-dark: #d89b00;
            --accent-soft: rgba(245, 180, 0, 0.14);
            --black: #12141a;
            --white: #ffffff;
            --success: #22c55e;
            --danger: #ef4444;
            --shadow: 0 22px 70px rgba(17, 19, 24, 0.10);
            --shadow-sm: 0 12px 36px rgba(17, 19, 24, 0.08);
            --radius: 24px;
        }

        [data-theme="dark"] {
            --bg: #0b0f19;
            --bg-soft: #111827;
            --card: rgba(17, 24, 39, 0.84);
            --card-solid: #111827;
            --text: #f9fafb;
            --text-soft: #d1d5db;
            --muted: #9ca3af;
            --border: rgba(255, 255, 255, 0.10);
            --accent: #facc15;
            --accent-dark: #eab308;
            --accent-soft: rgba(250, 204, 21, 0.13);
            --shadow: 0 22px 80px rgba(0, 0, 0, 0.36);
            --shadow-sm: 0 12px 42px rgba(0, 0, 0, 0.24);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 84% 14%, rgba(245, 180, 0, 0.12), transparent 28%),
                radial-gradient(circle at 18% 28%, rgba(37, 99, 235, 0.06), transparent 30%),
                linear-gradient(180deg, var(--bg) 0%, var(--bg-soft) 100%);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea {
            font: inherit;
        }

        .site-shell {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin-inline: auto;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 90;
            background: rgba(251, 250, 247, 0.78);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(22px);
        }

        [data-theme="dark"] .navbar {
            background: rgba(11, 15, 25, 0.78);
        }

        .navbar-inner {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text);
            font-size: 26px;
            line-height: 1;
            font-weight: 950;
            letter-spacing: -1px;
        }

        .brand-dot {
            width: 7px;
            height: 7px;
            margin-top: 14px;
            border-radius: 999px;
            background: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 34px;
            font-size: 14px;
            font-weight: 820;
            color: var(--text-soft);
        }

        .nav-links a {
            position: relative;
            padding: 28px 0 24px;
            transition: color .2s ease;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 20%;
            right: 20%;
            bottom: 16px;
            height: 3px;
            border-radius: 999px;
            background: var(--accent);
            opacity: 0;
            transform: scaleX(.45);
            transition: .2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--text);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            opacity: 1;
            transform: scaleX(1);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .theme-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 40px;
            padding: 6px 9px;
            border-radius: 999px;
            border: 1px solid var(--border);
            color: var(--text);
            background: var(--card);
            cursor: pointer;
            box-shadow: var(--shadow-sm);
        }

        .toggle-track {
            position: relative;
            width: 43px;
            height: 23px;
            border-radius: 999px;
            background: var(--black);
        }

        [data-theme="dark"] .toggle-track {
            background: var(--accent);
        }

        .toggle-thumb {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            background: var(--white);
            transition: .2s ease;
        }

        [data-theme="dark"] .toggle-thumb {
            left: 23px;
            background: #111827;
        }

        .icon-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icon-button,
        .social-icon {
            width: 39px;
            height: 39px;
            display: inline-grid;
            place-items: center;
            border-radius: 13px;
            color: var(--text);
            border: 1px solid transparent;
            background: transparent;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
        }

        .icon-button:hover,
        .social-icon:hover {
            transform: translateY(-2px);
            background: var(--card);
            border-color: var(--border);
        }

        .icon-button svg,
        .social-icon svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .hero {
            padding: 58px 0 34px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: .96fr 1.04fr;
            gap: 58px;
            align-items: center;
        }

        .availability {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 32px;
            padding: 6px 13px;
            border-radius: 999px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text-soft);
            font-size: 13px;
            font-weight: 820;
            box-shadow: var(--shadow-sm);
        }

        .availability-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--success);
            box-shadow: 0 0 0 5px rgba(34, 197, 94, .12);
        }

        .hero-title {
            max-width: 670px;
            margin: 26px 0 18px;
            font-size: clamp(42px, 6vw, 68px);
            line-height: 1.05;
            letter-spacing: -2.8px;
            font-weight: 950;
        }

        .accent-text {
            color: var(--accent-dark);
        }

        .hero-description {
            max-width: 500px;
            margin: 0 0 28px;
            color: var(--text-soft);
            font-size: 17px;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 46px;
            padding: 12px 22px;
            border-radius: 13px;
            border: 1px solid transparent;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease, background .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            color: #111318;
            background: var(--accent);
            box-shadow: 0 16px 34px rgba(245, 180, 0, .22);
        }

        .btn-dark {
            color: #ffffff;
            background: #111318;
            box-shadow: 0 16px 34px rgba(17, 19, 24, .16);
        }

        .btn-outline {
            color: var(--text);
            background: var(--card);
            border-color: var(--border);
        }

        .tech-strip {
            margin-top: 28px;
        }

        .tech-strip-title {
            display: block;
            margin-bottom: 11px;
            color: var(--text);
            font-size: 13px;
            font-weight: 900;
        }

        .tech-strip-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 18px;
        }

        .tech-mini {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--text-soft);
            font-size: 13px;
            font-weight: 820;
        }

        .tech-mini span {
            width: 20px;
            height: 20px;
            display: inline-grid;
            place-items: center;
            border-radius: 7px;
            color: #111318;
            background: var(--accent-soft);
            font-size: 11px;
            font-weight: 950;
        }

        .hero-media {
            position: relative;
            min-height: 430px;
        }

        .yellow-shape {
            position: absolute;
            left: 24px;
            bottom: 36px;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            background: rgba(245, 180, 0, .24);
            filter: blur(.2px);
        }

        .dot-pattern {
            position: absolute;
            left: 0;
            top: 142px;
            width: 92px;
            height: 92px;
            background-image: radial-gradient(var(--accent) 1.8px, transparent 1.8px);
            background-size: 14px 14px;
            opacity: .68;
        }

        .portfolio-preview {
            position: absolute;
            inset: 0 36px 0 76px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preview-window {
            width: 100%;
            min-height: 330px;
            overflow: hidden;
            border-radius: 28px;
            background:
                radial-gradient(circle at 80% 0%, rgba(245, 180, 0, .16), transparent 30%),
                linear-gradient(135deg, rgba(255,255,255,.94), rgba(255,255,255,.72));
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        [data-theme="dark"] .preview-window {
            background:
                radial-gradient(circle at 80% 0%, rgba(245, 180, 0, .12), transparent 30%),
                linear-gradient(135deg, rgba(17,24,39,.94), rgba(17,24,39,.72));
        }

        .preview-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            background: rgba(255,255,255,.42);
        }

        [data-theme="dark"] .preview-topbar {
            background: rgba(255,255,255,.04);
        }

        .preview-dots {
            display: inline-flex;
            gap: 7px;
        }

        .preview-dots span {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ef4444;
        }

        .preview-dots span:nth-child(2) {
            background: #f59e0b;
        }

        .preview-dots span:nth-child(3) {
            background: #22c55e;
        }

        .preview-url {
            padding: 7px 12px;
            border-radius: 999px;
            color: var(--muted);
            background: rgba(17,19,24,.06);
            font-size: 12px;
            font-weight: 800;
        }

        [data-theme="dark"] .preview-url {
            background: rgba(255,255,255,.07);
        }

        .preview-content {
            display: grid;
            grid-template-columns: 72px 1fr;
            gap: 0;
            min-height: 280px;
        }

        .preview-sidebar {
            display: grid;
            align-content: start;
            gap: 12px;
            padding: 22px 18px;
            border-right: 1px solid var(--border);
            background: rgba(17,19,24,.035);
        }

        [data-theme="dark"] .preview-sidebar {
            background: rgba(255,255,255,.035);
        }

        .preview-sidebar span {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(17,19,24,.08);
        }

        [data-theme="dark"] .preview-sidebar span {
            background: rgba(255,255,255,.08);
        }

        .preview-sidebar span:first-child {
            background: var(--accent);
        }

        .preview-main {
            display: grid;
            gap: 14px;
            padding: 22px;
        }

        .preview-hero-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 20px;
            border-radius: 22px;
            background:
                linear-gradient(135deg, rgba(245,180,0,.18), rgba(255,255,255,.56));
            border: 1px solid var(--border);
        }

        [data-theme="dark"] .preview-hero-card {
            background:
                linear-gradient(135deg, rgba(245,180,0,.12), rgba(255,255,255,.04));
        }

        .preview-hero-card small {
            display: inline-flex;
            margin-bottom: 8px;
            color: var(--accent-dark);
            font-size: 12px;
            font-weight: 900;
        }

        .preview-hero-card strong {
            display: block;
            color: var(--text);
            font-size: 22px;
            line-height: 1.15;
            letter-spacing: -.6px;
        }

        .preview-hero-card p {
            max-width: 280px;
            margin: 8px 0 0;
            color: var(--text-soft);
            font-size: 13px;
        }

        .preview-avatar {
            width: 74px;
            height: 74px;
            flex: 0 0 74px;
            display: grid;
            place-items: center;
            border-radius: 24px;
            color: #111318;
            background: var(--accent);
            font-size: 34px;
            font-weight: 950;
            box-shadow: 0 18px 34px rgba(245, 180, 0, .24);
        }

        .preview-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .preview-stats div {
            padding: 15px;
            border-radius: 18px;
            background: rgba(255,255,255,.58);
            border: 1px solid var(--border);
        }

        [data-theme="dark"] .preview-stats div {
            background: rgba(255,255,255,.045);
        }

        .preview-stats strong {
            display: block;
            color: var(--text);
            font-size: 22px;
            line-height: 1;
            margin-bottom: 6px;
        }

        .preview-stats span {
            color: var(--text-soft);
            font-size: 12px;
            font-weight: 800;
        }

        .preview-project {
            display: grid;
            grid-template-columns: 96px 1fr;
            gap: 14px;
            align-items: center;
            padding: 14px;
            border-radius: 18px;
            background: rgba(255,255,255,.58);
            border: 1px solid var(--border);
        }

        [data-theme="dark"] .preview-project {
            background: rgba(255,255,255,.045);
        }

        .preview-project-thumb {
            height: 66px;
            border-radius: 14px;
            background:
                linear-gradient(135deg, rgba(17,19,24,.86), rgba(245,180,0,.26)),
                repeating-linear-gradient(0deg, rgba(255,255,255,.12) 0 1px, transparent 1px 10px);
        }

        .preview-project strong {
            display: block;
            color: var(--text);
            font-size: 14px;
            margin-bottom: 4px;
        }

        .preview-project p {
            margin: 0;
            color: var(--text-soft);
            font-size: 12px;
        }

        .floating-code {
            position: absolute;
            left: 44px;
            top: 62px;
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            color: #ffffff;
            background: #111318;
            box-shadow: var(--shadow-sm);
            font-size: 22px;
            font-weight: 950;
        }

        .floating-stat {
            position: absolute;
            right: 0;
            top: 120px;
            width: 130px;
            min-height: 118px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255,255,255,.88);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(16px);
            color: #111318;
        }

        .floating-stat strong {
            display: block;
            font-size: 26px;
            line-height: 1;
            margin-bottom: 6px;
        }

        .floating-stat span {
            color: #4b5563;
            font-size: 12px;
            font-weight: 820;
        }

        .mini-chart {
            margin-top: 16px;
            height: 34px;
            border-radius: 10px;
            background:
                linear-gradient(135deg, transparent 0 15%, var(--accent) 15% 18%, transparent 18% 35%, var(--accent) 35% 38%, transparent 38% 58%, var(--accent) 58% 61%, transparent 61% 100%);
            opacity: .85;
        }

        .floating-message {
            position: absolute;
            right: 4px;
            bottom: 64px;
            width: 245px;
            padding: 18px;
            border-radius: 17px;
            color: #ffffff;
            background: #111318;
            box-shadow: var(--shadow);
        }

        .floating-message p {
            margin: 0;
            font-size: 14px;
            font-weight: 760;
        }

        .section {
            padding: 14px 0;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(20px);
        }

        .top-panels {
            display: grid;
            grid-template-columns: 1.05fr 1.18fr .68fr;
            gap: 14px;
        }

        .panel {
            padding: 24px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 14px;
        }

        .section-icon {
            width: 34px;
            height: 34px;
            display: inline-grid;
            place-items: center;
            border-radius: 13px;
            color: #111318;
            background: var(--accent-soft);
            border: 1px solid rgba(245, 180, 0, .22);
            font-weight: 950;
        }

        .section-title h2 {
            margin: 0;
            font-size: 20px;
            letter-spacing: -.4px;
        }

        .panel p {
            color: var(--text-soft);
            margin: 0 0 18px;
            font-size: 14px;
        }

        .about-visual {
            display: grid;
            grid-template-columns: 1fr 180px;
            gap: 20px;
            align-items: center;
        }

        .desk-art {
            position: relative;
            height: 128px;
            border-radius: 20px;
            background:
                radial-gradient(circle at 30% 55%, rgba(34, 197, 94, .18), transparent 28%),
                linear-gradient(135deg, rgba(17,19,24,.04), rgba(245,180,0,.08));
            overflow: hidden;
        }

        .desk-art::before {
            content: "";
            position: absolute;
            left: 22px;
            bottom: 24px;
            width: 54px;
            height: 72px;
            border-radius: 999px 999px 0 0;
            background:
                radial-gradient(ellipse at 35% 30%, #16a34a 0 12px, transparent 13px),
                radial-gradient(ellipse at 58% 18%, #22c55e 0 14px, transparent 15px),
                radial-gradient(ellipse at 68% 48%, #4ade80 0 12px, transparent 13px);
        }

        .desk-art::after {
            content: "";
            position: absolute;
            right: 22px;
            bottom: 24px;
            width: 96px;
            height: 68px;
            border-radius: 10px;
            background: linear-gradient(135deg, #d1d5db, #9ca3af);
            box-shadow: 0 14px 30px rgba(17,19,24,.14);
        }

        .skills-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 18px;
        }

        .tabs {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tab {
            padding: 7px 14px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,.52);
            color: var(--text-soft);
            font-size: 12px;
            font-weight: 840;
        }

        [data-theme="dark"] .tab {
            background: rgba(255,255,255,.04);
        }

        .tab.active {
            color: #111318;
            border-color: rgba(245, 180, 0, .45);
            background: var(--accent-soft);
        }

        .tech-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 12px;
        }

        .tech-card {
            min-height: 82px;
            display: grid;
            place-items: center;
            gap: 8px;
            padding: 12px 8px;
            border-radius: 17px;
            background: rgba(255,255,255,.62);
            border: 1px solid var(--border);
            text-align: center;
        }

        [data-theme="dark"] .tech-card {
            background: rgba(255,255,255,.045);
        }

        .tech-card-icon {
            width: 38px;
            height: 38px;
            display: inline-grid;
            place-items: center;
            border-radius: 13px;
            color: #111318;
            background: #ffffff;
            box-shadow: 0 10px 24px rgba(17,19,24,.08);
            font-size: 12px;
            font-weight: 950;
        }

        .tech-card strong {
            color: var(--text);
            font-size: 12px;
        }

        .learning {
            margin-top: 16px;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 12px;
            color: var(--text-soft);
            font-size: 12px;
            font-weight: 760;
        }

        .learning-bar {
            grid-column: 1 / -1;
            height: 7px;
            overflow: hidden;
            border-radius: 999px;
            background: rgba(17,19,24,.10);
        }

        [data-theme="dark"] .learning-bar {
            background: rgba(255,255,255,.10);
        }

        .learning-bar span {
            display: block;
            width: 87%;
            height: 100%;
            border-radius: inherit;
            background: var(--accent);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            height: 100%;
        }

        .stat-box {
            padding: 22px;
            border-right: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .stat-box:nth-child(2n) {
            border-right: 0;
        }

        .stat-box:nth-child(n+3) {
            border-bottom: 0;
        }

        .stat-box span {
            width: 29px;
            height: 29px;
            display: inline-grid;
            place-items: center;
            border-radius: 11px;
            margin-bottom: 10px;
            background: var(--accent-soft);
            color: var(--accent-dark);
            font-weight: 950;
        }

        .stat-box strong {
            display: block;
            color: var(--text);
            font-size: 24px;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-box small {
            color: var(--text-soft);
            font-size: 12px;
            font-weight: 780;
        }

        .projects-contact {
            display: grid;
            grid-template-columns: 1fr .48fr;
            gap: 14px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 18px;
        }

        .panel-header a {
            color: var(--text);
            font-size: 13px;
            font-weight: 850;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .project-card {
            overflow: hidden;
            border-radius: 18px;
            background: var(--card-solid);
            border: 1px solid var(--border);
            box-shadow: 0 12px 28px rgba(17,19,24,.07);
        }

        [data-theme="dark"] .project-card {
            background: rgba(255,255,255,.04);
        }

        .project-thumb {
            position: relative;
            height: 128px;
            background:
                linear-gradient(135deg, rgba(17,19,24,.88), rgba(17,19,24,.30)),
                repeating-linear-gradient(0deg, rgba(255,255,255,.08) 0 1px, transparent 1px 14px);
            overflow: hidden;
        }

        .project-thumb::before {
            content: "";
            position: absolute;
            inset: 16px;
            border-radius: 12px;
            background:
                linear-gradient(90deg, #111318 0 32%, #f8fafc 32% 100%);
            opacity: .82;
        }

        .project-thumb::after {
            content: "Featured";
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 9px;
            border-radius: 999px;
            color: #111318;
            background: var(--accent);
            font-size: 11px;
            font-weight: 950;
        }

        .project-body {
            padding: 14px;
        }

        .project-body h3 {
            margin: 0 0 6px;
            color: var(--text);
            font-size: 15px;
        }

        .project-body p {
            margin: 0 0 11px;
            color: var(--text-soft);
            font-size: 12px;
            line-height: 1.45;
        }

        .tag-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 999px;
            background: rgba(17,19,24,.06);
            color: var(--text-soft);
            font-size: 11px;
            font-weight: 850;
        }

        [data-theme="dark"] .tag {
            background: rgba(255,255,255,.07);
        }

        .connect-card {
            background:
                radial-gradient(circle at 92% 16%, rgba(245, 180, 0, .12), transparent 32%),
                var(--card);
        }

        .contact-list {
            display: grid;
            gap: 11px;
            margin: 18px 0;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-soft);
            font-size: 13px;
            font-weight: 780;
        }

        .contact-item span {
            width: 30px;
            height: 30px;
            display: inline-grid;
            place-items: center;
            border-radius: 11px;
            color: var(--accent-dark);
            background: var(--accent-soft);
        }

        .contact-form {
            display: grid;
            gap: 12px;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .form-control {
            width: 100%;
            min-height: 44px;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 12px 14px;
            outline: none;
            color: var(--text);
            background: var(--card-solid);
            transition: box-shadow .2s ease, border-color .2s ease;
        }

        [data-theme="dark"] .form-control {
            background: rgba(255,255,255,.05);
        }

        .form-control:focus {
            border-color: rgba(245, 180, 0, .62);
            box-shadow: 0 0 0 4px rgba(245, 180, 0, .13);
        }

        textarea.form-control {
            min-height: 116px;
            resize: vertical;
        }

        .error {
            color: var(--danger);
            font-size: 12px;
            font-weight: 760;
            margin-top: 4px;
        }

        .alert-success {
            padding: 13px 14px;
            border-radius: 14px;
            color: #166534;
            background: #dcfce7;
            border: 1px solid rgba(34, 197, 94, .22);
            font-size: 13px;
            font-weight: 850;
        }

        .footer {
            padding: 14px 0 32px;
        }

        .footer-inner {
            display: grid;
            grid-template-columns: 1.25fr .7fr .7fr .8fr 1.25fr;
            gap: 28px;
            padding: 26px;
            border-radius: var(--radius);
            background: var(--card);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(18px);
        }

        .footer h3 {
            margin: 0 0 12px;
            color: var(--text);
            font-size: 15px;
        }

        .footer p,
        .footer a,
        .footer li {
            color: var(--text-soft);
            font-size: 13px;
        }

        .footer ul {
            list-style: none;
            display: grid;
            gap: 7px;
            padding: 0;
            margin: 0;
        }

        .newsletter {
            display: flex;
            gap: 10px;
            margin-top: 14px;
        }

        .newsletter input {
            width: 100%;
            min-height: 43px;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 12px 14px;
            color: var(--text);
            background: var(--card-solid);
            outline: none;
        }

        [data-theme="dark"] .newsletter input {
            background: rgba(255,255,255,.05);
        }

        .project-detail {
            min-height: 100vh;
            padding: 54px 0;
        }

        .detail-card {
            border-radius: var(--radius);
            padding: 28px;
            background: var(--card);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .detail-header h1 {
            margin: 10px 0 10px;
            font-size: clamp(34px, 5vw, 56px);
            line-height: 1;
            letter-spacing: -2px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--accent-soft);
            border: 1px solid rgba(245, 180, 0, .22);
            color: var(--text);
            font-size: 12px;
            font-weight: 900;
        }

        .skill-line {
            display: grid;
            gap: 7px;
        }

        .skill-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-soft);
            font-size: 13px;
            font-weight: 850;
        }

        .bar {
            height: 8px;
            overflow: hidden;
            border-radius: 999px;
            background: rgba(17,19,24,.10);
        }

        [data-theme="dark"] .bar {
            background: rgba(255,255,255,.10);
        }

        .bar-fill {
            height: 100%;
            border-radius: inherit;
            background: var(--accent);
        }

        .content-box {
            color: var(--text-soft);
        }

        .content-box p {
            color: var(--text-soft);
        }

        @media (max-width: 1120px) {
            .hero-grid,
            .top-panels,
            .projects-contact,
            .footer-inner {
                grid-template-columns: 1fr;
            }

            .hero-media {
                min-height: 390px;
            }

            .portfolio-preview {
                inset: 0 0 0 70px;
            }

            .tech-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .project-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .container {
                width: min(100% - 24px, 1180px);
            }

            .navbar-inner {
                min-height: auto;
                padding: 14px 0;
                flex-direction: column;
            }

            .nav-links {
                width: 100%;
                flex-wrap: wrap;
                justify-content: center;
                gap: 16px;
            }

            .nav-links a {
                padding: 6px 0;
            }

            .nav-links a::after {
                bottom: -4px;
            }

            .nav-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding-top: 36px;
            }

            .hero-title {
                font-size: clamp(36px, 12vw, 54px);
                letter-spacing: -2px;
            }

            .hero-media {
                min-height: 430px;
            }

            .portfolio-preview {
                inset: 0;
            }

            .preview-content {
                grid-template-columns: 1fr;
            }

            .preview-sidebar {
                display: none;
            }

            .preview-stats {
                grid-template-columns: 1fr;
            }

            .preview-project {
                grid-template-columns: 1fr;
            }

            .floating-code {
                left: 12px;
                top: 20px;
            }

            .floating-stat {
                right: 12px;
                top: 88px;
            }

            .floating-message {
                left: 12px;
                right: 12px;
                bottom: 16px;
                width: auto;
            }

            .about-visual,
            .field-grid {
                grid-template-columns: 1fr;
            }

            .desk-art {
                display: none;
            }

            .skills-head,
            .panel-header,
            .detail-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .tabs,
            .tech-strip-list {
                flex-wrap: wrap;
            }

            .tech-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-box {
                border-right: 0;
            }

            .stat-box:nth-child(n+3) {
                border-bottom: 1px solid var(--border);
            }

            .stat-box:last-child {
                border-bottom: 0;
            }

            .newsletter {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="site-shell">
        {{ $slot }}
    </div>

    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('[data-theme-toggle]');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
                    const nextTheme = currentTheme === 'light' ? 'dark' : 'light';

                    document.documentElement.setAttribute('data-theme', nextTheme);
                    localStorage.setItem('portfolio-theme', nextTheme);
                });
            });
        });
    </script>
</body>
</html>