<?php

namespace App\Filament\Admin\Resources\DesignDiagramResource\Pages;

use App\Filament\Admin\Resources\DesignDiagramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesignDiagrams extends ListRecords
{
    protected static string $resource = DesignDiagramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}