<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuperAdminService;
use App\Services\AdminService;
use App\Models\Setting;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InventoryItemsImport;
use App\Exports\InventoryItemsExport;
use ZipArchive;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $superAdminService;
    protected $adminService;

    public function __construct(SuperAdminService $superAdminService)
    {
        $this->middleware('auth');
        $this->superAdminService = $superAdminService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = auth()->user()->getrole->name;
        
        if($user_role == 'Super Admin'){
            $data = $this->superAdminService->index(null);
        }else{
            $user_id = auth()->user()->id;
            $data = $this->superAdminService->index($user_id);
        }

        return view('home',compact('data'));
    }

    public function settings()
    {
        if(auth()->user()->getrole->name == 'Super Admin'){
            $alert_count = Setting::where('heading','inventory_low_alert_limit')->value('value');
        }else{
            $alert_count = '';
        }
        return view('settings',compact('alert_count'));
    }

    public function update_settings(Request $request)
    {
        
        if($request->password){
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);

            User::where('id',auth()->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if(auth()->user()->getrole->name == 'Super Admin'){
            Setting::where('heading','inventory_low_alert_limit')->update([
                'value' => $request->low_alert_limit,
            ]);
        }

        return redirect()->route('home');
    }

    public function export()
    {
        return Excel::download(new InventoryItemsExport, 'inventory_items.xlsx');
    }

    public function import(Request $request)
    {
        try{

            Excel::import(new InventoryItemsImport, $request->file('file'));
            // return response()->json(['data'=>'Users imported successfully.',201]);
            return redirect()->route('inventory.index')->with('success', 'Inventory items imported successfully.');
        }catch(\Exception $ex){
            // dd($ex);
            // Log::info($ex);
            // return response()->json(['data'=>'Some error has occur.',400]);
            return redirect()->route('inventory.index')->with('error', 'Some error has occur');
        }

    }

}
