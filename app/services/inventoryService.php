<?php
namespace App\Services;

use App\Models\Setting;
use App\Models\User;
use App\Models\InventoryItem;

class InventoryService
{
    /**
     * Store a new post.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function index()
    {
        if(auth()->user()->getrole->name == 'Super Admin'){
            $items  = InventoryItem::latest()->get();
        }else{
            $items  = InventoryItem::where('user_id',auth()->user()->id)->latest()->get();
        }

        $alert_limit = Setting::where('heading','inventory_low_alert_limit')->value('value');

        $data = [
            'items' => $items,
            'alert_limit' => $alert_limit,
        ];
       
        return $data;
    }

    public function store(array $data)
    {
       
        $data = InventoryItem::create([
            'user_id'           => auth()->user()->id,
            'name'              => $data['name'],
            'description'       => $data['description'],
            'quantity_in_stock' => $data['quantity_in_stock'],
            'price'             => $data['price'],
        ]);

        return $data;
    }

    public function update(array $data, $id)
    {
       
        $data = InventoryItem::where('id',$id)->update([
            'name'              => $data['name'],
            'description'       => $data['description'],
            'quantity_in_stock' => $data['quantity_in_stock'],
            'price'             => $data['price'],
        ]);

        return $data;
    }
    
}
