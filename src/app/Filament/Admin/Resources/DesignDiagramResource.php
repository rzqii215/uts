<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DesignDiagramResource\Pages;
use App\Models\DesignDiagram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DesignDiagramResource extends Resource
{
    protected static ?string $model = DesignDiagram::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Design Diagram';

    protected static ?string $modelLabel = 'Design Diagram';

    protected static ?string $pluralModelLabel = 'Design Diagrams';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Diagram')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('type')
                            ->label('Tipe Diagram')
                            ->options([
                                'erd' => 'ERD',
                                'flowchart' => 'Flowchart',
                            ])
                            ->required()
                            ->unique(ignoreRecord: true),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('image_path')
                            ->label('Path Gambar')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Contoh: images/diagrams/erd.png atau images/diagrams/flowchart.png'),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => strtoupper($state))
                    ->color(fn (string $state): string => match ($state) {
                        'erd' => 'warning',
                        'flowchart' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('image_path')
                    ->label('Path Gambar')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDesignDiagrams::route('/'),
            'create' => Pages\CreateDesignDiagram::route('/create'),
            'edit' => Pages\EditDesignDiagram::route('/{record}/edit'),
        ];
    }
}