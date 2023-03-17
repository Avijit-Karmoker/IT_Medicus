<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::all();
        return view('dashboard.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required'
        ]);

        //when some one give the company logo
        if($request->hasfile('company_logo')) {
            $extention = $request->file('company_logo')->getClientOriginalExtension();
            $new_company_logo_name = time() . "." . $extention;
            $img = Image::make($request->file('company_logo'))->resize(176, 31);
            $img->save(base_path('public/uploads/company_logo/' . $new_company_logo_name), 80);


            Companies::insert([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_logo' => $new_company_logo_name,
                'website_link' => $request->website_link,
                'created_at' => Carbon::now(),
            ]);
        }
        //when some one don't give the company logo
        else {
            Companies::insert([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'website_link' => $request->website_link,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.companies.edit', [
            'company' => Companies::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;
        Companies::find($id)->update([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'website_link' => $request->website_link,
        ]);

        if($request->hasfile('company_logo')) {
            $extention = $request->file('company_logo')->getClientOriginalExtension();
            $new_company_logo_name = time() . "." . $extention;
            $img = Image::make($request->file('company_logo'))->resize(176, 31);
            $img->save(base_path('public/uploads/company_logo/' . $new_company_logo_name), 80);

            Companies::find($id)->update([
                'company_logo' => $new_company_logo_name,
            ]);
        }

        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Companies::find($id)->delete();
        return redirect('/company');
    }
}
