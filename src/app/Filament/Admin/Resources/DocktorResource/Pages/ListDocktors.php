<?php

namespace App\Filament\Admin\Resources\DocktorResource\Pages;

use App\Filament\Admin\Resources\DocktorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocktors extends ListRecords
{
    protected static string $resource = DocktorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
