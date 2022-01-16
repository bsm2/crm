<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactPersonResource;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Traits\ApiResponse;

class ContactPersonController extends Controller
{

    use ApiResponse;

    public function index(Request $request)
    {
        $contactPeople= ContactPerson::when($request->search,function($q) use($request){
            
            return $q->where('first_name','LIKE','%'.$request->search.'%')
                    ->orWhere('last_name','LIKE','%'.$request->search.'%')
                    ->orWhere('email','LIKE','%'.$request->search.'%')
                    ->orWhere('phone','LIKE','%'.$request->search.'%');
                    
        })->with(['company' => function($query) use ($request){

            $query->where('name', 'like', '%'.$request->search.'%');
            
        }])->latest()->paginate(10)->appends(request()->all());

        $contactPeople_collection= ContactPersonResource::collection($contactPeople);

        return $this->listData('all the contact people',$contactPeople_collection);
    }


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
        $contactPerson=ContactPerson::create($data);
        return $this->success('new contact successfully added',$contactPerson);
    }

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
        return $this->success('contact successfully updated',$contactPerson);

    }


    public function destroy(ContactPerson $contactPerson)
    {
        $contactPerson->delete();
        return $this->success(' contact successfully deleted',$contactPerson);
    }
}
