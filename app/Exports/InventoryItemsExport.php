<?php

namespace App\Exports;

use App\Models\InventoryItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryItemsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $user_role = auth()->user()->getrole->name;

        if($user_role == 'Super Admin'){
            return InventoryItem::select("id", "name", "description","quantity_in_stock","price")->get();
        }else{
            return InventoryItem::select("id", "name", "description","quantity_in_stock","price")->where('user_id',auth()->user()->id)->get();
        }

    }

    public function headings(): array
    {
        return ["ID", "Name", "Description","Quantity in Stock","Price"];
    }
}

