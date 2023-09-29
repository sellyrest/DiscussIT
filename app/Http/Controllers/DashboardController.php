<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use App\Models\Topik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){
        $topuser = User::withCount(['topik' => function($q){
            $q->where('status', 1);
        }])
            ->where('status', 1)
            ->having('topik_count', '!=', 0)
            ->orderByDESC('topik_count')
            ->take(3)
            ->get();
        $topic = Topik::orderBy('id', 'DESC')
            ->where('status', 1)
            ->paginate(5);
        $saved = new Saved();
        return view('pages.index', compact('topic', 'saved', 'topuser'));
    }


    public function searchTopic(Request $request)
    {
        $keyword = $request->keyword;
        $topic = Topik::where('title', 'like', '%'.$keyword.'%')
            ->orWhereHas('user', function($q) use($keyword) {
                $q->where('fullname', 'like', '%'.$keyword.'%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(5);
        $user = User::where('username', 'like', '%'.$keyword.'%')
            ->orWhere('fullname', 'like', '%'.$keyword.'%' )
            ->where('status', 1)
            ->get();

        return view('pages.search', compact('topic', 'user'));
    }

    public function profile()
    {
        return view('pages.profile');
    }
    public function updateProfile(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $validator = Validator::make($data, [
            'fullname'           => ['required', 'min:5'],
            'username'           => ['required', 'min:2', 'unique:users,username,'.$user->id],
            'email'           => ['required', 'email', 'unique:users,email,'.$user->id],
            'password'           => ['nullable','min:6', 'string'],
            'nomor_telpon'           => ['required', 'min:9', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:14'],
            'foto'          => ['max:5120']

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

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName =  Str::slug($request->username) . '_' . md5(uniqid(rand(), true)) . $ext;
            $file->move(public_path('img/profile/'), $newName);
            $data['foto'] = $newName;
        }else{
            $data['foto'] = $user->foto;
        }
        $user->update($data);
        if ($user) {
            return redirect()->back()->with('success', 'Data Has Been Updated');
        } else {
            return redirect()->back()->with('error', 'Data Error');
        }
    }
    public function detailProfile($id)
    {
        $user = User::where('username', $id)->first();
        return view('pages.profile-view', compact('user'));
    }
}
