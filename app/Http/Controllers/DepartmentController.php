<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    // Page for department

    // Show all departments
    public function showAll(): View
    {
        $departments = Department::orderBy('name')->get();
        return view('admin.department', compact('departments'));
    }

    // Store a new department
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Department::create($request->all());

        session()->flash('message', 'Department created successfully!');

        return redirect()->route('departments');
    }

    // Store an edited department
    public function update(Request $request, $id): RedirectResponse
    {
        $department = Department::find($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $department->update($request->all());

        session()->flash('message', 'Department updated successfully!');

        return redirect()->route('departments');
    }

    // Deleting a department
    public function delete($id): RedirectResponse
    {
        $department = Department::findOrFail($id);

        $department->delete();

        session()->flash('message', 'Department deleted successfully!');

        return redirect()->route('departments');
    }
}
