<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('dashboard.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        return view('dashboard.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required'
        ]);

        Employee::insert([
            'employee_name' => $request->employee_name,
            'company' => $request->company,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'created_at' => Carbon::now(),
        ]);
        return redirect('employee');
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
        return view('dashboard.employee.edit', [
            'employee' => Employee::find($id),
            'companies' => Companies::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Employee::find($id)->update([
            'employee_name' => $request->employee_name,
            'company' => $request->company,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ]);
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return redirect('/employee');
    }
}
