<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dept = Department::get();
        return view("department.list",compact("dept"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("department.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dept = new Department();
        $dept->name =$request->name;
        $dept->description = $request->description;
        $dept->save();
        return redirect('dept');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);
        return view("department.edit",compact("department"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dept = Department::find($id);
        $dept->name =$request->name;
        $dept->description = $request->description;
        $dept->save();
        return redirect('dept');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "this function is triggered";
    }
}
