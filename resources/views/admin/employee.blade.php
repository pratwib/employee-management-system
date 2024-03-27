@extends('admin.layouts.master')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Employees</h6>

        <a href="#addModal" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#addModal">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Employee</span>
        </a>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('employees.add') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Input name" autofocus>
                                @error('name')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Input email" autofocus>
                                @error('email')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" placeholder="Input address" autofocus>
                                @error('address')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="phone" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" name="phone_number" placeholder="Input phone number" autofocus>
                                @error('phone_number')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" placeholder="Input position" autofocus>
                                @error('position')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date" autofocus>
                                @error('start_date')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-control @error('department_id') is-invalid @enderror"
                                    id="department_id" name="department_id">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="mt-1 alert alert-danger" role="alert" style="font-size: 12px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Position</th>
                        <th>Start date</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->start_date }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>
                                <a href="#editModal{{ $employee->id }}" class="btn btn-info btn-circle btn-sm"
                                    data-toggle="modal" data-target="#editModal{{ $employee->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <div class="modal fade" id="editModal{{ $employee->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form
                                                action="{{ route('employees.edit', ['id' => $employee->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Input name"
                                                            value="{{ $employee->name }}" autofocus>
                                                        @error('name')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Email</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" placeholder="Input email"
                                                            value="{{ $employee->email }}" autofocus>
                                                        @error('email')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text"
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            id="address" name="address" placeholder="Input address"
                                                            value="{{ $employee->address }}" autofocus>
                                                        @error('address')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone_number" class="form-label">Phone
                                                            Number</label>
                                                        <input type="phone"
                                                            class="form-control @error('phone_number') is-invalid @enderror"
                                                            id="phone_number" name="phone_number"
                                                            placeholder="Input phone number"
                                                            value="{{ $employee->phone_number }}" autofocus>
                                                        @error('phone_number')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="position" class="form-label">Position</label>
                                                        <input type="text"
                                                            class="form-control @error('position') is-invalid @enderror"
                                                            id="position" name="position" placeholder="Input position"
                                                            value="{{ $employee->position }}" autofocus>
                                                        @error('position')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="start_date" class="form-label">Start Date</label>
                                                        <input type="date"
                                                            class="form-control @error('start_date') is-invalid @enderror"
                                                            id="start_date" name="start_date"
                                                            value="{{ $employee->start_date }}" autofocus>
                                                        @error('start_date')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="department_id" class="form-label">Department</label>
                                                        <select
                                                            class="form-control @error('department_id') is-invalid @enderror"
                                                            id="department_id" name="department_id">
                                                            <option value="{{ $department->id }}">{{ $employee->department->name }}
                                                            </option>
                                                            @foreach($departments as $department)
                                                                <option value="{{ $department->id }}">
                                                                    {{ $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('department_id')
                                                            <div class="mt-1 alert alert-danger" role="alert"
                                                                style="font-size: 12px;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a href="#deleteModal{{ $employee->id }}" class="btn btn-danger btn-circle btn-sm"
                                    data-toggle="modal" data-target="#deleteModal{{ $employee->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <div class="modal fade" id="deleteModal{{ $employee->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form
                                                action="{{ route('employees.delete', ['id' => $employee->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h6 class="text" style="text-align: center;">
                                                        Are you sure you want to delete this employee?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
