<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Models\Company;

class CompanyController extends Controller
{

    use ApiResponse;

    public function index(Request $request)
    {
        $companies= Company::when($request->search,function($q) use($request){
            
            return $q->where('name','LIKE','%'.$request->search.'%')
                    ->orWhere('email','LIKE','%'.$request->search.'%');

        })->latest()->paginate(10)->appends(request()->all());

        $companies_collection = CompanyResource::collection($companies);
        
        return $this->listData('all the companies',$companies_collection);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            
            'name' => 'required',
            'email' => 'required|unique:companies',
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif|dimensions:min_width=100,min_height=100',
            'website_url'=>'url'
            
        ]);

        if ($request->hasFile('logo')) {
            $data['logo']=$request->file('logo')->store('companies');
        }

        $company=Company::create($data);
        
        return $this->success('acompany successfully added',$company);
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' =>['required',Rule::unique('companies')->ignore($company->id)],
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif|dimensions:min_width=100,min_height=100',
            'website_url'=>'url'
            
        ]);
        if ($request->hasFile('logo')) {
            Storage::has($company->logo)? Storage::delete($company->logo):'';
            $data['logo']=$request->file('logo')->store('companies');
        }
        $company->update($data);
        
        return $this->success('acompany successfully updated',$company) ;
    }
}
