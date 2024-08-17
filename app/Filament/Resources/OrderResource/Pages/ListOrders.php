<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getTabs() : array {
        return [
            null => Tab::make('All'),
            'new' => Tab::make()->query(fn ($query) => $query->where('status','new')),
            'proccessing' => Tab::make()->query(fn ($query) => $query->where('status','proccessing')),
            'shipped' => Tab::make()->query(fn ($query) => $query->where('status','shipped')),
            'delivered' => Tab::make()->query(fn ($query) => $query->where('status','delivered')),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status','cancelled')),
        ];
    }
}
