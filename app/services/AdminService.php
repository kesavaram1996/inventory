<?php
namespace App\Services;

use App\Models\User;
use App\Models\InventoryItem;

class AdminService
{
    /**
     * Store a new post.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function index()
    {
       
        $admins  = User::role('Admin')->latest()->get();

        $data = [
            'admins' => $admins,
        ];
       
        return $data;
    }

    public function store(array $data)
    {
       
        $data = User::create($data);
        $data->assignRole([2]);

        return $data;
    }
    
}
