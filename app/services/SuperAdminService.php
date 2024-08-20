<?php
namespace App\Services;

use App\Models\User;
use App\Models\InventoryItem;

class SuperAdminService
{
    /**
     * Store a new post.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function index($user_id)
    {
       
        $recent_admins  = User::role('Admin')->latest()->take(5)->get();
        $total_admins   = count(User::role('Admin')->get());
        
        if($user_id){
            $recent_items   = InventoryItem::where('user_id',$user_id)->latest()->take(5)->get();
            $total_items    = count(InventoryItem::where('user_id',$user_id)->get());
        }else{
            $recent_items   = InventoryItem::latest()->take(5)->get();
            $total_items    = count(InventoryItem::all());
        }
        
        $data = [
            'recent_admins' => $recent_admins,
            'recent_items'  => $recent_items,
            'total_admins'  => $total_admins,
            'total_items'   => $total_items,
        ];
        
        return $data;
    }

    
}
