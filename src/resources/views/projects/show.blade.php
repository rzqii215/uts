<x-layouts.app>
    @php
        $statusLabels = [
            'planning' => 'Perencanaan',
            'progress' => 'Sedang Dikerjakan',
            'completed' => 'Selesai',
        ];

        $status = $statusLabels[$project->status] ?? 'Tidak Diketahui';
    @endphp

    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}" class="brand" aria-label="Rizqi Portfolio">
                <span class="brand-mark">R</span>
                <span class="brand-text">Riz<span>qi</span></span>
            </a>

            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#projects" class="active">Projects</a>
                <a href="{{ route('home') }}#contact">Contact</a>
            </div>

            <button type="button" class="theme-toggle" data-theme-toggle aria-label="Ganti tema">
                <span>☀</span>
                <span class="toggle-track">
                    <span class="toggle-thumb"></span>
                </span>
                <span>☾</span>
            </button>
        </div>
    </nav>

    <main class="project-detail">
        <div class="container">
            <article class="detail-card glass">
                <div class="detail-header">
                    <div>
                        <span class="status-badge">
                            <span class="eyebrow-dot"></span>
                            {{ $status }}
                        </span>

                        <h1>{{ $project->title }}</h1>

                        <p class="hero-description">
                            {{ $project->short_description }}
                        </p>
                    </div>

                    <a href="{{ route('home') }}#projects" class="btn btn-outline">
                        ← Kembali
                    </a>
                </div>

                <div class="skill-line" style="margin-bottom: 26px;">
                    <div class="skill-meta">
                        <span>Progress Project</span>
                        <span>{{ $project->progress }}%</span>
                    </div>

                    <div class="bar">
                        <div class="bar-fill" style="width: {{ max(0, min(100, $project->progress)) }}%"></div>
                    </div>
                </div>

                <div class="projects-card" style="box-shadow: none; border: 1px solid var(--border); background: rgba(255,255,255,.035);">
                    <div class="section-heading">
                        <div class="title-icon">
                            <span>▣</span>
                            <h2>Deskripsi Project</h2>
                        </div>
                    </div>

                    <div class="content-box">
                        {!! $project->description !!}
                    </div>
                </div>

                <div class="projects-card" style="margin-top: 16px; box-shadow: none; border: 1px solid var(--border); background: rgba(255,255,255,.035);">
                    <div class="section-heading">
                        <div class="title-icon">
                            <span>⌘</span>
                            <h2>Tech Stack</h2>
                        </div>
                    </div>

                    <div class="tag-row">
                        @foreach (array_map('trim', explode(',', $project->tech_stack ?: 'Laravel, Livewire, Blade, Filament V3, MariaDB, Docker')) as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="button-row" style="margin-top: 22px;">
                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline">
                            GitHub
                        </a>
                    @endif

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary">
                            Live Demo
                        </a>
                    @endif

                    <a href="{{ route('home') }}" class="btn btn-outline">
                        Home
                    </a>
                </div>
            </article>
        </div>
    </main>
</x-layouts.app>