@extends('layouts.dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('employee.create') }}">Add Comapny</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Employee</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="basic-form">
                        <div class="mb-4">
                            <label for="" class="form-label">Employee Name</label>
                            <input type="text" required name="employee_name" class="form-control" placeholder="employee name">
                            @error('employee_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Company Name</label>
                            <select name="company" id="" class="form-control">
                                <option value="">-Select-</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Employee Email</label>
                            <input type="email" name="email" class="form-control" placeholder="employee email">
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Phone no</label>
                            <input type="tel" name="phone_no" class="form-control" placeholder="employee phone no">
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-sm btn-info">Add Employee</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
