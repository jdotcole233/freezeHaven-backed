<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeSalaryRequest;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;

class EmployeeSalaries extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeSalaryRequest $request)
    {
        $employee_salary = EmployeeSalary::create($request->all());

        return response()->json([
            'data' => $employee_salary,
            'message' => 'Employee Salary added successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
