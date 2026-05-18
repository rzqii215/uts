<?php

namespace App\Filament\Admin\Resources\DesignDiagramResource\Pages;

use App\Filament\Admin\Resources\DesignDiagramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesignDiagram extends EditRecord
{
    protected static string $resource = DesignDiagramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}