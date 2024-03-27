<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    // Page for employee

    // Show all employees
    public function showAll(): View
    {
        $employees = Employee::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();
      
        return view('admin.employee', compact('employees', 'departments'));
    }

    // Store a new employee
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());

        session()->flash('message', 'Employee created successfully!');

        return redirect()->route('employees');
    }

    // Store an edited employee
    public function update(Request $request, $id): RedirectResponse
    {
        $employee = Employee::find($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $employee->id, // Ensure unique email for updates
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
        ]);

        $employee->update($request->all());

        session()->flash('message', 'Employee updated successfully!');

        return redirect()->route('employees');
    }

    // Deleting an employee
    public function delete($id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        session()->flash('message', 'Employee deleted successfully!');

        return redirect()->route('employees');
    }
}
