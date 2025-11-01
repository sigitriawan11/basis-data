<?php

namespace App\Filament\Admin\Resources\DocktorResource\Pages;

use App\Filament\Admin\Resources\DocktorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocktor extends EditRecord
{
    protected static string $resource = DocktorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
