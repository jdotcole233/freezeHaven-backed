<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
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
        return Employee::select(

            "id",
            'first_name',
            'last_name',
            'phone_number',
            'date_employed',
            'date_of_termination',
            'location',
            'dob',
            'gender',

        )->orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        info('Some data ');
        $employee = Employee::create($request->all());

        return response()->json([
            'data' => $employee,
            'message' => 'Employee created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee =  Employee::with(['salaries' => function ($query) {
            return $query->select('employee_id', 'salary', 'date_paid');
        }])->find($id);
        info(json_encode($employee));

        $emp = $employee->salaries->each(function ($salary) {
            $salary->id = $salary->employee_id;
            $salary->date_paid = Carbon::parse($salary->date_paid)->toFormattedDayDateString();
            unset($salary->employee_id);
        })->all();

        $employee->salaries = $emp;

        info(json_encode($employee));

        return $employee;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id)->update($request->all());

        return response()->json(['data' => $employee, 
        'message' => 'Employee record updated successfully'], 
        200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
