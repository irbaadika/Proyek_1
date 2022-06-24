<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class DashboardInventoryController extends Controller
{
    public function index()
    {
        return view('dashboard.inventories.index',[
            'inventories' => Inventory::all(),
            'user' => User::all()->count()
        ]);
    }

    public function member()
    {
        return view('dashboard.AdminUser',[
            'judul' => 'Dashboard',
            'users' => DB::table('users')->where('role',0)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.inventories.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:inventories',
            'penulis' => 'required|max:100',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'desc' => 'required'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('inventory-images');
        }


        $validateData['pendek'] = Str::limit(Strip_tags($request->desc), 200);

        Inventory::Create($validateData);

        return redirect('/dashboard/inventories')->with('success','New inventory has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('dashboard.inventories.show',[
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('dashboard.inventories.edit',[
            'inventory' => $inventory,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $rules =[
            'title' => 'required|max:255',
            'penulis' => 'required|max:100',
            'category_id' => 'required',
            'desc' => 'required'
        ];

        

        if($request->slug != $inventory->slug){
            $rules['slug'] = 'required|unique:inventories';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('inventory-images');
        }

        $validateData['pendek'] = Str::limit(Strip_tags($request->desc), 200);

        Inventory::where('id', $inventory->id)
            ->update($validateData);

        return redirect('/dashboard/inventories')->with('success','New inventory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        if($inventory->image){
            Storage::delete($inventory->image);
        }
        Inventory::Destroy($inventory->id);

        return redirect('/dashboard/inventories')->with('success','New inventory has been deleted!');
    }
}
