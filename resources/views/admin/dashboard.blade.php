@extends('admin.layouts.master')

@section('content')
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('employees') }}"
            class="card border-left-warning shadow h-100 py-2 text-decoration-none">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Employees
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @isset($totalEmployees)
                                {{ $totalEmployees }}
                            @else
                                0
                            @endisset
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('departments') }}"
            class="card border-left-success shadow h-100 py-2 text-decoration-none">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Departments
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @isset($totalDepartments)
                                {{ $totalDepartments }}
                            @else
                                0
                            @endisset
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
