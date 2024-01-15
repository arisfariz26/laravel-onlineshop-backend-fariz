<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get users with pagination
        $users = User::latest()->get();
        return view('pages.user.index', compact('users'));
    }

    //create
    public function create()
    {
        return view('pages.user.create');
    }

    //store
    public function store(Request $request)
    {
         //validate form
         $this->validate($request, [
            'name'     => 'required',
            'email' => 'required|email',
            'password'     => 'required|min:8',
            'phone'     => 'required',
            'roles'   => 'required'
        ]);

        //create post
        User::create([
            'name'     => $request->name,
            'email'     => $request->email,
            'password'     => Hash::make($request->password),
            'phone'   => $request->phone,
            'roles'   => $request->roles
        ]);

        //redirect to index
        return redirect()->route('user.index')->with([
            'message' => 'Data Berhasil Disimpan!',
            'alert-type' => 'success'
        ]);
    }

    //show
    public function show($id)
    {
        return abort(404);
    }

    //edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    //update
    public function update(Request $request, $id)
    {
    // Validate form
    $this->validate($request, [
        'name'     => 'required',
        'email'    => 'required|email',
        'password' => 'nullable|min:8', // Allow password to be nullable
        'phone'    => 'required',
        'roles'    => 'required'
    ]);

    $user = User::findOrFail($id);

    // Prepare data for update
    $data = [
        'name'  => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'roles' => $request->roles,
    ];

    // Update password only if provided
    if ($request->password) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    //redirect to index
    return redirect()->route('user.index')->with([
        'message' => 'Data Berhasil Diedit!',
        'alert-type' => 'success'
        ]);
    }

    //destroy
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with([
            'message' => 'Data Berhasil Dihapus!',
        'alert-type' => 'success'
    ]);
    }
}
