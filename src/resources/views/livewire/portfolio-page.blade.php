<div>
    @php
        $activeProfile = $profile;

        $displayName = $activeProfile?->name ?: 'Muhamad Rizqi Candra';
        $displayProfession = $activeProfile?->profession ?: 'UI/UX Designer';
        $displayBio = $activeProfile?->bio ?: 'Saya Adalah UI/UX';
        $displayAbout = $activeProfile?->about ?: 'Saya Adalah Mahasiswa Semester 4 Universitas Esa Unggul';
        $displayEmail = $activeProfile?->email ?: 'rzqicndra0@gmail.com';
        $displayLocation = $activeProfile?->location ?: 'Tangerang';
        $displayPhone = $activeProfile?->phone ?: '082211662026';

        $githubUrl = $activeProfile?->github_url ?: 'https://github.com/rzqii215';
        $instagramUrl = $activeProfile?->instagram_url ?: 'https://www.instagram.com/exyezzet?igsh=MXM3OHhvcjdhYTdiYw==';

        $defaultTech = ['Laravel', 'Filament', 'Livewire', 'PHP', 'MySQL', 'Docker'];

        $techIcons = [
            'Laravel' => 'L',
            'Filament' => 'F',
            'Filament V3' => 'F',
            'Livewire' => 'LW',
            'PHP' => 'PHP',
            'MySQL' => 'DB',
            'MariaDB' => 'DB',
            'Docker' => 'D',
            'Tailwind CSS' => 'TW',
            'Blade' => 'B',
            'Git' => 'G',
            'JavaScript' => 'JS',
        ];

        $showcaseProjects = $featuredProjects->isNotEmpty() ? $featuredProjects : $projects->take(3);
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}" class="brand" aria-label="Rizqi Portfolio">
                <span>Rizqi</span>
                <span class="brand-dot"></span>
            </a>

            <div class="nav-links">
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#diagram">Diagram</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </div>

            <div class="nav-actions">
                <button type="button" class="theme-toggle" data-theme-toggle aria-label="Ganti tema">
                    <span>☼</span>
                    <span class="toggle-track">
                        <span class="toggle-thumb"></span>
                    </span>
                    <span>☾</span>
                </button>

                <div class="icon-group">
                    <a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer" class="icon-button" aria-label="GitHub">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.38 7.86 10.9.58.1.79-.25.79-.56 0-.28-.01-1.2-.02-2.18-3.2.7-3.88-1.36-3.88-1.36-.52-1.32-1.27-1.68-1.27-1.68-1.04-.71.08-.7.08-.7 1.15.08 1.75 1.18 1.75 1.18 1.02 1.75 2.67 1.25 3.32.96.1-.74.4-1.25.72-1.54-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.18-3.1-.12-.29-.51-1.46.11-3.05 0 0 .97-.31 3.17 1.18a10.96 10.96 0 0 1 5.77 0c2.2-1.49 3.17-1.18 3.17-1.18.62 1.59.23 2.76.11 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.69 5.41-5.25 5.69.41.35.78 1.04.78 2.1 0 1.52-.01 2.75-.01 3.13 0 .31.21.67.8.56A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5Z"/>
                        </svg>
                    </a>

                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="icon-button" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.8A3.95 3.95 0 0 0 3.8 7.75v8.5a3.95 3.95 0 0 0 3.95 3.95h8.5a3.95 3.95 0 0 0 3.95-3.95v-8.5a3.95 3.95 0 0 0-3.95-3.95h-8.5Zm8.97 1.35a1.08 1.08 0 1 1 0 2.16 1.08 1.08 0 0 1 0-2.16ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.8A3.2 3.2 0 1 0 12 15.2 3.2 3.2 0 0 0 12 8.8Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section id="home" class="hero">
            <div class="container hero-grid">
                <div>
                    <span class="availability">
                        <span class="availability-dot"></span>
                        Available for work
                    </span>

                    <h1 class="hero-title">
                        Hi, saya
                        <span class="accent-text">{{ $displayName }}.</span>
                    </h1>

                    <p class="hero-description">
                        {{ $displayBio }}
                    </p>

                    <div class="button-row">
                        <a href="#projects" class="btn btn-primary">
                            View My Work
                            <span>→</span>
                        </a>
                    </div>

                    <div class="tech-strip">
                        <span class="tech-strip-title">Tech Stack</span>

                        <div class="tech-strip-list">
                            @forelse ($skills->take(7) as $skill)
                                <span class="tech-mini">
                                    <span>{{ $techIcons[$skill->name] ?? strtoupper(substr($skill->name, 0, 2)) }}</span>
                                    {{ $skill->name }}
                                </span>
                            @empty
                                @foreach ($defaultTech as $tech)
                                    <span class="tech-mini">
                                        <span>{{ $techIcons[$tech] ?? strtoupper(substr($tech, 0, 2)) }}</span>
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="hero-media">
                    <div class="yellow-shape"></div>
                    <div class="dot-pattern"></div>

                    <div class="portfolio-preview">
                        <div class="preview-window">
                            <div class="preview-topbar">
                                <div class="preview-dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <div class="preview-url">
                                    portfolio.rizqi.dev
                                </div>
                            </div>

                            <div class="preview-content">
                                <div class="preview-sidebar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <div class="preview-main">
                                    <div class="preview-hero-card">
                                        <div>
                                            <small>{{ $displayProfession }}</small>
                                            <strong>{{ $displayName }}</strong>
                                            <p>{{ $displayAbout }}</p>
                                        </div>

                                        <div class="preview-avatar">
                                            R
                                        </div>
                                    </div>

                                    <div class="preview-stats">
                                        <div>
                                            <strong>4</strong>
                                            <span>Semester</span>
                                        </div>

                                        <div>
                                            <strong>UI</strong>
                                            <span>Design</span>
                                        </div>

                                        <div>
                                            <strong>UX</strong>
                                            <span>Research</span>
                                        </div>
                                    </div>

                                    <div class="preview-project">
                                        <div class="preview-project-thumb"></div>

                                        <div>
                                            <strong>Portfolio Website</strong>
                                            <p>Laravel, Livewire, Blade, Filament V3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="floating-code">
                        UI
                    </div>

                    <div class="floating-stat">
                        <strong>4</strong>
                        <span>Semester</span>
                        <div class="mini-chart"></div>
                    </div>

                    <div class="floating-message">
                        <p>
                            Mahasiswa Semester 4 Universitas Esa Unggul.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="section">
            <div class="container top-panels">
                <div class="card panel">
                    <div class="about-visual">
                        <div>
                            <div class="section-title">
                                <span class="section-icon">♙</span>
                                <h2>About Me</h2>
                            </div>

                            <p>
                                {{ $displayAbout }}
                            </p>

                            <a href="#contact" class="btn btn-outline">
                                More About Me
                                <span>→</span>
                            </a>
                        </div>

                        <div class="desk-art"></div>
                    </div>
                </div>

                <div id="skills" class="card panel">
                    <div class="skills-head">
                        <div class="section-title">
                            <span class="section-icon">⚡</span>
                            <h2>Skills & Expertise</h2>
                        </div>

                        <div class="tabs">
                            <span class="tab active">UI/UX</span>
                            <span class="tab">Frontend</span>
                            <span class="tab">Tools</span>
                        </div>
                    </div>

                    <div class="tech-grid">
                        @forelse ($skills->take(6) as $skill)
                            <div class="tech-card">
                                <span class="tech-card-icon">
                                    {{ $techIcons[$skill->name] ?? strtoupper(substr($skill->name, 0, 2)) }}
                                </span>
                                <strong>{{ $skill->name }}</strong>
                            </div>
                        @empty
                            @foreach ($defaultTech as $tech)
                                <div class="tech-card">
                                    <span class="tech-card-icon">
                                        {{ $techIcons[$tech] ?? strtoupper(substr($tech, 0, 2)) }}
                                    </span>
                                    <strong>{{ $tech }}</strong>
                                </div>
                            @endforeach
                        @endforelse
                    </div>

                    <div class="learning">
                        <span>Always learning and exploring new technologies.</span>
                        <strong>87%</strong>
                        <div class="learning-bar">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="card stats-grid">
                    <div class="stat-box">
                        <span>▣</span>
                        <strong>{{ max($projects->count(), 1) }}+</strong>
                        <small>Projects</small>
                    </div>

                    <div class="stat-box">
                        <span>☻</span>
                        <strong>4</strong>
                        <small>Semester</small>
                    </div>

                    <div class="stat-box">
                        <span>⌘</span>
                        <strong>{{ max($skills->count(), 6) }}+</strong>
                        <small>Technologies</small>
                    </div>

                    <div class="stat-box">
                        <span>♥</span>
                        <strong>100%</strong>
                        <small>Learning Progress</small>
                    </div>
                </div>
            </div>
        </section>

        @include('components.portfolio.diagram-section')

        <section id="projects" class="section">
            <div class="container projects-contact">
                <div class="card panel">
                    <div class="panel-header">
                        <div class="section-title">
                            <span class="section-icon">▤</span>
                            <h2>Featured Projects</h2>
                        </div>

                        <a href="#projects">
                            View all projects →
                        </a>
                    </div>

                    <div class="project-grid">
                        @forelse ($showcaseProjects->take(3) as $project)
                            <article class="project-card">
                                <div class="project-thumb"></div>

                                <div class="project-body">
                                    <h3>{{ $project->title }}</h3>

                                    <p>
                                        {{ $project->short_description }}
                                    </p>

                                    <div class="tag-row">
                                        @foreach (array_slice(array_map('trim', explode(',', $project->tech_stack ?: 'Laravel, Livewire, Filament')), 0, 3) as $tag)
                                            <span class="tag">{{ $tag }}</span>
                                        @endforeach
                                    </div>

                                    <div style="margin-top: 12px;">
                                        <a href="{{ route('projects.show', $project) }}" class="tag">
                                            View Project →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            @foreach ([
                                ['title' => 'Portfolio Website', 'desc' => 'Website portofolio dinamis menggunakan Laravel, Livewire, Blade, dan Filament V3.', 'tags' => ['Laravel', 'Livewire', 'Filament']],
                                ['title' => 'UI/UX Case Study', 'desc' => 'Rancangan tampilan aplikasi yang fokus pada pengalaman pengguna.', 'tags' => ['UI/UX', 'Design', 'Research']],
                                ['title' => 'Admin Panel Portfolio', 'desc' => 'Panel admin untuk mengelola profile, skill, project, dan pesan kontak.', 'tags' => ['Filament', 'MariaDB', 'Docker']],
                            ] as $demoProject)
                                <article class="project-card">
                                    <div class="project-thumb"></div>

                                    <div class="project-body">
                                        <h3>{{ $demoProject['title'] }}</h3>

                                        <p>
                                            {{ $demoProject['desc'] }}
                                        </p>

                                        <div class="tag-row">
                                            @foreach ($demoProject['tags'] as $tag)
                                                <span class="tag">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @endforelse
                    </div>
                </div>

                <div id="contact" class="card panel connect-card">
                    <div class="section-title">
                        <span class="section-icon">➤</span>
                        <h2>Let’s Connect</h2>
                    </div>

                    <p>
                        Have a project in mind or just want to say hello? I’d love to hear from you!
                    </p>

                    <div class="contact-list">
                        <div class="contact-item">
                            <span>✉</span>
                            {{ $displayEmail }}
                        </div>

                        <div class="contact-item">
                            <span>☎</span>
                            {{ $displayPhone }}
                        </div>

                        <div class="contact-item">
                            <span>⌖</span>
                            {{ $displayLocation }}
                        </div>
                    </div>

                    @livewire('contact-form')
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <div>
                <a href="{{ route('home') }}" class="brand">
                    <span>Rizqi</span>
                    <span class="brand-dot"></span>
                </a>

                <p>
                    Building digital experiences with passion and purpose.
                </p>

                <p>
                    © {{ date('Y') }} Rizqi. All rights reserved.
                </p>
            </div>

            <div>
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#diagram">Diagram</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3>Resources</h3>
                <ul>
                    <li>Laravel</li>
                    <li>Filament</li>
                    <li>Livewire</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                </ul>
            </div>

            <div>
                <h3>Let’s Connect</h3>
                <ul>
                    <li><a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer">GitHub</a></li>
                    <li><a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                    <li><a href="mailto:{{ $displayEmail }}">Email</a></li>
                </ul>
            </div>

            <div>
                <h3>Contact Info</h3>
                <p>{{ $displayEmail }}</p>
                <p>{{ $displayPhone }}</p>
                <p>{{ $displayLocation }}</p>
            </div>
        </div>
    </footer>
</div>