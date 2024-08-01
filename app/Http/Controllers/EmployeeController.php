<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $emp = Employee::get();
        return view("employee.list",compact("emp"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = Department::get();
        return view("employee.create",compact("dept"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp = new Employee();
        $emp->name =$request->name;
        $emp->email = $request->email;
        $emp->dob =$request->dob;
        $emp->gender = $request->gender;
        $emp->doj =$request->doj;
        $emp->address = $request->address;
        $emp->mobile =$request->mobile;
        $img = $request->file("image");
        $filename = uniqid().".".$img->getClientOriginalExtension();
        $img->storeAs("public/images",$filename);
        $emp->image = "images/".$filename;
        $emp->department_id = $request->department_id;
        $emp->designation_id = $request->designation_id;
        $emp->save();
        return redirect('emp');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $emp = Employee::find($id);
        $emp->name =$request->name;
        $emp->email = $request->email;
        $emp->dob =$request->dob;
        $emp->gender = $request->gender;
        $emp->doj =$request->doj;
        $emp->address = $request->address;
        $emp->mobile =$request->mobile;
        $img = $request->file("image");
        $filename = uniqid().".".$img->getClientOriginalExtension();
        $img->storeAs("public/images",$filename);
        $emp->image = "images/".$filename;
        $emp->department_id = $request->department_id;
        $emp->designation_id = $request->designation_id;
        $emp->save();
        return redirect('emp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Employee::find($id);
        $emp->save();
        return redirect('emp');
    }
}
