<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contactPeople= ContactPerson::when($request->search,function($q) use($request){
            
            return $q->where('first_name','LIKE','%'.$request->search.'%')
                    ->orWhere('last_name','LIKE','%'.$request->search.'%')
                    ->orWhere('email','LIKE','%'.$request->search.'%')
                    ->orWhere('phone','LIKE','%'.$request->search.'%');
                    
        })->with(['company' => function($query) use ($request){
            $query->where('name', 'like', '%'.$request->search.'%');
        }])->latest()->paginate(10);

        return view('dashboard.contact_person.index',compact('contactPeople'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('dashboard.contact_person.create',compact('companies'));
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'company_id'=>'required|integer',
            'phone'=>'required',
            'email' => 'required|unique:contact_people',
            'linkedin_url'=>'url|nullable'
            
        ]);
        ContactPerson::create($data);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.contactPerson.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function show(ContactPerson $contactPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactPerson $contactPerson)
    {
        $companies=Company::all();
        return view('dashboard.contact_person.edit',compact('contactPerson','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactPerson $contactPerson)
    {
        $data = $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'company_id'=>'required|integer',
            'phone'=>'required',
            'email' => ['required',Rule::unique('contact_people')->ignore($contactPerson->id)],
            'linkedin_url'=>'url|nullable'
            
        ]);
        $contactPerson->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.contactPerson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactPerson $contactPerson)
    {
        $contactPerson->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.contactPerson.index');
    }
}
