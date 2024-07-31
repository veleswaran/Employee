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
        $desig = Designation::get();
        $dept = Department::get();
        $emp = Employee::get();
        return view("employee.list",compact("desig","dept","emp"));
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
        $desig = new Employee();
        $desig->name =$request->name;
        $desig->email = $request->email;
        $desig->dob =$request->dob;
        $desig->gender = $request->gender;
        $desig->doj =$request->doj;
        $desig->address = $request->address;
        $desig->mobile =$request->mobile;
        $img = $request->file("image");
        $filename = uniqid().".".$img->getClientOriginalExtension();
        $img->storeAs("public/images",$filename);
        $desig->image = "images/".$filename;
        $desig->department_id = $request->department_id;
        $desig->designation_id = $request->designation_id;
        $desig->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
