@extends('layouts.dashboardmaster')

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('company.index') }}">Compaines</a></li>
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
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Websites</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($companies as $company)
                                        <tr>
                                            <td>{{ Str::title($company->company_name) }}</td>
                                            <td>{{ $company->company_email }}</td>
                                            <td><img src="{{ asset('uploads/company_logo') }}/{{ $company->company_logo }}"
                                                    alt=""></td>
                                            <td><a class="btn-sm bg-info text-light"
                                                    href="{{ $company->website_link }}" target="_blank">Website</a></td>
                                            <td>
                                                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm text-light bg-warning">Edit</a>
                                                <form action="{{ route('company.destroy', $company->id) }}" method="POST">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
