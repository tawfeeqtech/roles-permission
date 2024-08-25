<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public $permission;
    //
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        // $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Permission::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $this->permission->create([
            'name' => $request->name
        ]);

        toastr()->success('permission created successfully!');
        return redirect()->route('permissions.index');
        // return redirect()->route('users.profile');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.pages.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        toastr()->success('permission updated successfully!');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
