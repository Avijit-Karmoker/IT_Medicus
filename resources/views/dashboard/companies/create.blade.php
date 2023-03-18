@extends('layouts.dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('company.create') }}">Add Comapny</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Comapny</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="basic-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control"
                                placeholder="company name">
                            @error('company_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Company Email</label>
                            <input type="email" name="company_email" class="form-control"
                                placeholder="company email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Company Logo</label>
                            <input type="file" name="company_logo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Website Link</label>
                            <input type="url" name="website_link" class="form-control"
                                placeholder="website link">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-info">Add Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
