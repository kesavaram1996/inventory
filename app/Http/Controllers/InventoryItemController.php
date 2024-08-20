<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;
use App\Imports\InventoryItemsImport;
use App\Exports\InventoryItemsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\InventoryService;
use App\Http\Requests\InventoryRequest;

class InventoryItemController extends Controller
{
    protected $inventoryService;

    /**
     * Display a listing of the resource.
     */

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index()
    {
        $data = $this->inventoryService->index();
        return view('inventory.index', compact('data'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(InventoryRequest $request)
    {
        $data = $this->inventoryService->store($request->validated());
        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    public function edit($id)
    {
        $data = InventoryItem::where('id',$id)->get();
        return view('inventory.edit', compact('data'));
    }

    public function update(InventoryRequest $request,$id)
    {
        $data = $this->inventoryService->update($request->validated(),$id);
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy($id)
    {
        InventoryItem::where('id',$id)->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }


}
