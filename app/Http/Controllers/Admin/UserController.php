<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        return view('admin.users.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->only([
            'name', 'email', 'password','role'
        ]));
        $message = "Success Create";
        if ($user == null) {
            $message = "Create Failed";
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $bool = $user->update($request->only([
            'name', 'email', 'password','role'
        ]));

        $message =  "Success  Update";
        if (!$bool) {
            $message = "Update Failed";
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }


    public function destroy(string $id)
    {

        $message =  "Delete Full Failed";
        if (User::destroy($id)) {
            $message = "Success Delete";
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }
}
