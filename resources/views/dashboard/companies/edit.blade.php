@extends('layouts.dashboardmaster')

@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('company.create') }}">Edit Company Info</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Company Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ Str::title($company->company_name) }}">
                                @error('company_name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Company Email</label>
                                <input type="email" name="company_email" class="form-control"
                                value="{{ $company->company_email }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Company Logo</label>
                                <input type="file" name="company_logo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Website Link</label>
                                <input type="url" name="website_link" class="form-control"
                                value="{{ $company->website_link }}">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
