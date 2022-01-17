<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    function __construct()
    {
        $this->middleware('Admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $companies= Company::when($request->search,function($q) use($request){
            
            return $q->where('name_en','LIKE','%'.$request->search.'%')
                    ->orWhere('name_ar','LIKE','%'.$request->search.'%')
                    ->orWhere('email','LIKE','%'.$request->search.'%');
        })->latest()->paginate(10);

        return view('dashboard.company.index',compact('companies'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'email' => 'required|unique:companies',
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif|dimensions:min_width=100,min_height=100',
            'website_url'=>'url'
            
        ]);

        if ($request->hasFile('logo')) {
            $data['logo']=$request->file('logo')->store('companies');
        }
        //dd($data);

        $company= Company::create($data);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('dashboard.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'email' =>['required',Rule::unique('companies')->ignore($company->id)],
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif|dimensions:min_width=100,min_height=100',
            'website_url'=>'url'
            
        ]);
        if ($request->hasFile('logo')) {
            Storage::has($company->logo)? Storage::delete($company->logo):'';
            $data['logo']=$request->file('logo')->store('companies');
        }
        $company->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::has($company->logo)? Storage::delete($company->logo):'';
        $company->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.company.index');
    }
}
