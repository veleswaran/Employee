<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desig = Designation::get();
        return view("designation.list",compact("desig"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = Department::get();
        return view("designation.create",compact("dept"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $desig = new Designation();
        $desig->name =$request->name;
        $desig->description = $request->description;
        $desig->department_id = $request->department_id;
        $desig->save();
        return redirect('desig');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $desig = Designation::where(["department_id"=>$id])->get();
        return response()->json($desig);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $desig =  Designation::find($id);
        $desig->name =$request->name;
        $desig->description = $request->description;
        $desig->department_id = $request->department_id;
        $desig->save();
        return redirect('desig');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desig =  Designation::find($id);
        $desig->delete();
        return redirect("desig");
    }
}
