<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userList = User::all();
        return view('admin.users.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|max:225',
                'password' => 'required',
            ],
            [
                'name.required' => 'Nhập tên',
                'email.required' => 'Nhập email',
                'email.unique' => 'Email này đã tồn tại, Nhập email khác',
                'password.required' => 'Nhập password',
            ]
        );
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];


        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'Thêm user thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $bool = $user->update($request->only(['name', 'email', 'password']));
        $message = "Seccess full Created";
        if (!$bool) {
            $message = "Seccess full failed";
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $message = "Seccess full deleted";
        if (!User::destroy($id)) {
            $message = "Seccess full failed";
        }

        return redirect()->route('admin.users.index')->with('message', $message);
    }
}
