@php
    use App\Models\DesignDiagram;
    use Illuminate\Support\Facades\Schema;

    $diagramTableExists = Schema::hasTable('design_diagrams');

    $diagrams = $diagramTableExists
        ? DesignDiagram::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('type')
        : collect();

    $erd = $diagrams->get('erd');
    $flowchart = $diagrams->get('flowchart');

    $erdExists = $erd?->image_path && file_exists(public_path($erd->image_path));
    $flowchartExists = $flowchart?->image_path && file_exists(public_path($flowchart->image_path));
@endphp

<section id="diagram" class="section">
    <div class="container">
        <div class="card panel diagram-section">
            <div class="panel-header">
                <div class="section-title">
                    <span class="section-icon">⌘</span>
                    <h2>Rencana Perancangan Sistem</h2>
                </div>

                <span class="diagram-badge">
                    ERD & Flowchart
                </span>
            </div>

            <p class="diagram-description">
                Diagram berikut merupakan rancangan sistem yang tersimpan melalui seeder dan otomatis tampil dari database.
            </p>

            <div class="diagram-grid">
                <article class="diagram-card">
                    <div class="diagram-card-header">
                        <div>
                            <span class="diagram-label">Database Design</span>
                            <h3>{{ $erd?->title ?: 'Entity Relationship Diagram' }}</h3>
                        </div>

                        @if ($erdExists)
                            <a
                                href="{{ asset($erd->image_path) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="diagram-chip"
                            >
                                Lihat Gambar
                            </a>
                        @else
                            <span class="diagram-chip">Belum Ada</span>
                        @endif
                    </div>

                    <div class="diagram-image-wrap">
                        @if ($erdExists)
                            <img
                                src="{{ asset($erd->image_path) }}?v={{ filemtime(public_path($erd->image_path)) }}"
                                alt="{{ $erd->title }}"
                                class="diagram-image"
                            >
                        @else
                            <div class="diagram-empty">
                                <strong>Gambar ERD belum ditemukan.</strong>
                                <span>Taruh file di public/images/diagrams/erd.png</span>
                            </div>
                        @endif
                    </div>

                    @if ($erd?->description)
                        <div class="diagram-caption">
                            {{ $erd->description }}
                        </div>
                    @endif
                </article>

                <article class="diagram-card">
                    <div class="diagram-card-header">
                        <div>
                            <span class="diagram-label">System Flow</span>
                            <h3>{{ $flowchart?->title ?: 'Flowchart Sistem' }}</h3>
                        </div>

                        @if ($flowchartExists)
                            <a
                                href="{{ asset($flowchart->image_path) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="diagram-chip"
                            >
                                Lihat Gambar
                            </a>
                        @else
                            <span class="diagram-chip">Belum Ada</span>
                        @endif
                    </div>

                    <div class="diagram-image-wrap">
                        @if ($flowchartExists)
                            <img
                                src="{{ asset($flowchart->image_path) }}?v={{ filemtime(public_path($flowchart->image_path)) }}"
                                alt="{{ $flowchart->title }}"
                                class="diagram-image"
                            >
                        @else
                            <div class="diagram-empty">
                                <strong>Gambar Flowchart belum ditemukan.</strong>
                                <span>Taruh file di public/images/diagrams/flowchart.png</span>
                            </div>
                        @endif
                    </div>

                    @if ($flowchart?->description)
                        <div class="diagram-caption">
                            {{ $flowchart->description }}
                        </div>
                    @endif
                </article>
            </div>
        </div>
    </div>

    <style>
        .diagram-section {
            overflow: hidden;
        }

        .diagram-badge {
            display: inline-flex;
            align-items: center;
            min-height: 34px;
            padding: 8px 14px;
            border-radius: 999px;
            color: #111318;
            background: var(--accent);
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 12px 28px rgba(245, 180, 0, .22);
        }

        .diagram-description {
            max-width: 760px;
            margin: -4px 0 20px;
            color: var(--text-soft);
            font-size: 14px;
        }

        .diagram-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .diagram-card {
            overflow: hidden;
            border-radius: 22px;
            background: var(--card-solid);
            border: 1px solid var(--border);
            box-shadow: 0 14px 34px rgba(17, 19, 24, .07);
        }

        [data-theme="dark"] .diagram-card {
            background: rgba(255, 255, 255, .04);
        }

        .diagram-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 18px 14px;
            border-bottom: 1px solid var(--border);
        }

        .diagram-card-header h3 {
            margin: 4px 0 0;
            color: var(--text);
            font-size: 18px;
            line-height: 1.2;
            letter-spacing: -.4px;
        }

        .diagram-label {
            color: var(--accent-dark);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .diagram-chip {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 6px 12px;
            border-radius: 999px;
            color: var(--text);
            background: var(--accent-soft);
            border: 1px solid rgba(245, 180, 0, .22);
            font-size: 11px;
            font-weight: 900;
            transition: transform .2s ease, background .2s ease;
        }

        .diagram-chip:hover {
            transform: translateY(-2px);
            background: rgba(245, 180, 0, .22);
        }

        .diagram-image-wrap {
            overflow: auto;
            padding: 16px;
            background:
                radial-gradient(circle at 92% 10%, rgba(245, 180, 0, .08), transparent 28%),
                linear-gradient(135deg, rgba(17, 19, 24, .02), rgba(245, 180, 0, .03));
        }

        [data-theme="dark"] .diagram-image-wrap {
            background:
                radial-gradient(circle at 92% 10%, rgba(245, 180, 0, .08), transparent 28%),
                linear-gradient(135deg, rgba(255, 255, 255, .03), rgba(245, 180, 0, .035));
        }

        .diagram-image {
            width: 100%;
            min-width: 520px;
            height: auto;
            display: block;
            border-radius: 16px;
            border: 1px solid var(--border);
            background: #ffffff;
        }

        .diagram-empty {
            min-height: 260px;
            display: grid;
            place-items: center;
            gap: 8px;
            text-align: center;
            border-radius: 16px;
            border: 1px dashed var(--border);
            color: var(--text-soft);
            background: rgba(255, 255, 255, .45);
        }

        [data-theme="dark"] .diagram-empty {
            background: rgba(255, 255, 255, .04);
        }

        .diagram-empty strong {
            color: var(--text);
            font-size: 15px;
        }

        .diagram-empty span {
            font-size: 13px;
        }

        .diagram-caption {
            padding: 14px 18px 18px;
            color: var(--text-soft);
            border-top: 1px solid var(--border);
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 1120px) {
            .diagram-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .diagram-card-header,
            .panel-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .diagram-image {
                min-width: 680px;
            }
        }
    </style>
</section>