<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = User::where('role','admin')->paginate(10);
        return view('dashboard.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
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
            'name'=>'required|string',
            'email' => 'required|unique:contact_people',
            'password'=>'required|min:6',
            'role'=>'string|nullable'
        ]);
        if (empaty($request->role)) {
            $data['role']='admin';
        }
        User::create($data);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'email' => ['required',Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable|min:6',
            'role'=>'string|nullable'
            
        ]);

        if ($request->has('password')) {
            $data['password']= bcrypt($request->password);
        }else {
            $data['password']=$user->password;
        }
        $user->update($data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.admin.index');
    }
}
