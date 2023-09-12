<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('role', 'user')->orderBy('fullname');
            if ($request->search) {
                $user = $user->where('username', 'like', '%'.$request->search.'%')
                        ->orWhere('fullname', 'like', '%'.$request->search.'%')
                        ->orWhere('email', 'like', '%'.$request->search.'%');
            }
            $user = $user->paginate(10);
            return view('pages.admin.includes.user-list', compact('user'));
        }
        return view('pages.admin.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'fullname'           => ['required', 'min:5'],
            'username'           => ['required', 'min:2', 'unique:users'],
            'email'           => ['required', 'email', 'unique:users'],
            'password'           => ['required', 'min:6', 'string'],
            'nomor_telpon'           => ['required', 'min:9', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:14'],
            'role'           => ['required'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('admin.user.index')->with('success', 'Data Has Been Created');
        } else {
            return redirect()->back()->with('error', 'Data Error');
        }
        
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
        $user = User::find($id);
        return view('pages.admin.user-edit', compact('user'));
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
        $data = $request->all();
        $user = User::find($id);
        $validator = Validator::make($data, [
            'fullname'           => ['required', 'min:5'],
            'username'           => ['required', 'min:2', 'unique:users,username,'.$user->id],
            'email'           => ['required', 'email', 'unique:users,email,'.$user->id],
            'password'           => ['nullable','min:6', 'string'],
            'nomor_telpon'           => ['required', 'min:9', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:14'],
            'role'           => ['required'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            # code...
            $data['password'] = $user->password;
        }
        
        $user->update($data);
        if ($user) {
            return redirect()->route('admin.user.index')->with('success', 'Data Has Been Updated');
        } else {
            return redirect()->back()->with('error', 'Data Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $topic = Topik::where('user_id', $user->id)->count();
        if ($topic > 0) {
            return response()->json([
                'status'    => false,
            ]);
        } else {
            $path = 'img/profile/'.$user->foto;
            if (is_file($path)) {
                unlink($path);
            }
            $user->delete();
            return response()->json([
                'status'    => true,
            ]);
        }
        
    }
}
