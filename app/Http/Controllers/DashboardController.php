<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function dashboard()
    {
      $totalEmployees = Employee::count();
      $totalDepartments = Department::count();
    
      return view('admin.dashboard', compact('totalEmployees', 'totalDepartments'));
    }
}
