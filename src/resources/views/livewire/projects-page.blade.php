<div>
    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}" class="brand" aria-label="Rizqi Portfolio">
                <span>Rizqi</span>
                <span class="brand-dot"></span>
            </a>

            <div class="nav-links">
                <a href="{{ route('home') }}#home">Home</a>
                <a href="{{ route('home') }}#about">About</a>
                <a href="{{ route('home') }}#skills">Skills</a>
                <a href="{{ route('home') }}#diagram">Diagram</a>
                <a href="{{ route('projects.index') }}" class="active">Projects</a>
                <a href="{{ route('home') }}#contact">Contact</a>
            </div>

            <div class="nav-actions">
                <button type="button" class="theme-toggle" data-theme-toggle aria-label="Ganti tema">
                    <span>☼</span>
                    <span class="toggle-track">
                        <span class="toggle-thumb"></span>
                    </span>
                    <span>☾</span>
                </button>
            </div>
        </div>
    </nav>

    <main>
        <section class="project-detail">
            <div class="container">
                <div class="detail-card">
                    <div class="detail-header">
                        <div>
                            <span class="status-badge">
                                Portfolio Projects
                            </span>

                            <h1>All Projects</h1>

                            <p class="content-box" style="max-width: 720px;">
                                Berikut adalah semua project yang sudah dipublish melalui admin panel Filament.
                            </p>
                        </div>

                        <a href="{{ route('home') }}#projects" class="btn btn-outline">
                            ← Kembali
                        </a>
                    </div>

                    <div class="project-grid all-project-grid">
                        @forelse ($projects as $project)
                            <article class="project-card">
                                <div class="project-thumb"></div>

                                <div class="project-body">
                                    <h3>{{ $project->title }}</h3>

                                    <p>
                                        {{ $project->short_description }}
                                    </p>

                                    <div class="tag-row">
                                        @foreach (array_slice(array_map('trim', explode(',', $project->tech_stack ?: 'Laravel, Livewire, Filament')), 0, 4) as $tag)
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
                            <div class="diagram-empty" style="grid-column: 1 / -1;">
                                <strong>Belum ada project yang dipublish.</strong>
                                <span>Aktifkan toggle Publish di admin panel.</span>
                            </div>
                        @endforelse
                    </div>
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
                    <li><a href="{{ route('home') }}#home">Home</a></li>
                    <li><a href="{{ route('home') }}#about">About</a></li>
                    <li><a href="{{ route('home') }}#skills">Skills</a></li>
                    <li><a href="{{ route('home') }}#diagram">Diagram</a></li>
                    <li><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3>Resources</h3>
                <ul>
                    <li>Laravel</li>
                    <li>Filament</li>
                    <li>Livewire</li>
                    <li>PHP</li>
                    <li>MariaDB</li>
                </ul>
            </div>

            <div>
                <h3>Project Type</h3>
                <ul>
                    <li>Portfolio Website</li>
                    <li>UI/UX Design</li>
                    <li>Admin Panel</li>
                    <li>CRUD System</li>
                </ul>
            </div>

            <div>
                <h3>Contact Info</h3>
                <p>rzqicndra0@gmail.com</p>
                <p>082211662026</p>
                <p>Tangerang</p>
            </div>
        </div>
    </footer>

    <style>
        .all-project-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        @media (max-width: 1120px) {
            .all-project-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 760px) {
            .all-project-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</div>