<?php

namespace App\Imports;

use App\Models\InventoryItem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class InventoryItemsImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new InventoryItem([
            'user_id' => auth()->user()->id,
            'name' => $row[0],
            'description' => $row[1],
            'quantity_in_stock' => $row[2],
            'price' => $row[3],
        ]);
    }
}

