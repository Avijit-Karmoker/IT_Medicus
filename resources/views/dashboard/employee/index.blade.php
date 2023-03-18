@extends('layouts.dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('employee.index') }}">Compaines</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Photo Upload</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <table class="table table-bordered" id="category-table"
                        style="border-top: none; border-bottom: none;">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Employee Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ Str::title($employee->employee_name) }}</td>
                                    <td>{{ Str::title($employee->relationshipwithcompany->company_name) }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone_no }}</td>
                                    <td>
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm text-light bg-warning">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center">
                                        <strong class="text-danger">No data to show</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- for pagination --}}
                    <div class="m-auto mt-3">
                        @if (count($employees))
                            {{ $employees->links('pagination::bootstrap-5') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

