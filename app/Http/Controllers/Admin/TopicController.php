<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $topic = Topik::orderByDESC('created_at');
            if ($request->search) {
                $topic = $topic->where('title', 'like', '%'.$request->search.'%')
                        ->orWhere('content', 'like', '%'.$request->search.'%')
                        ->orWhere('image', 'like', '%'.$request->search.'%');
            }
            $topic = $topic->paginate(10);
            return view('pages.admin.includes.topic-list', compact('topic'));
        }
        return view('pages.admin.topic');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $topic = Topik::find($id);
        return view('pages.admin.topic-edit', compact('topic'));
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
        {
            $data = $request->all();
            $topic = Topik::find($id);
            $validator = Validator::make($data, [
                'title'           => ['required', 'min:5'],
                'content' => ['required', 'min:3'],
                'image' => ['image', 'max:2048'],
            ]);
            
            if ($request->hasFile('image')) {
                $path = 'img/' . $topic->image;
                if (is_file($path)) {
                    unlink($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $newName =  Str::slug($request->title) . '_' . md5(uniqid(rand(), true)) . $ext;
                $file->move(public_path('img/'), $newName);
                $topic->image = $newName;
                $topic->save();
            }
            if ($topic) {
                return redirect('/admin/topic')->with('success', 'Data Berhasil Disimpan!');
            } else {
                return redirect()->back()->with('error', 'Data Gagal Disimpan!');
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
    
            $topic->update($data);
            if ($topic) {
                return redirect()->route('admin.topic.index')->with('success', 'Data Has Been Updated');
            } else {
                return redirect()->back()->with('error', 'Data Error');
            }
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
        //
    }
}
