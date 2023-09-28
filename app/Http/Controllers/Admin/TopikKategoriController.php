<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopikKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopikKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $topic = TopikKategori::orderByDESC('created_at');
            if ($request->search) {
                $topic = $topic->where('name', 'like', '%'.$request->search.'%')
                        ->orWhere('status', 'like', '%'.$request->search.'%');
            }
            $topic = $topic->paginate(10);
            return view('pages.admin.includes.topic-category-list', compact('topic'));
        }
        return view('pages.admin.topic-category');
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
        $category = TopikKategori::create([
                    'name'  => $request->name,
                    'slug'  => Str::slug($request->name),
                ]);
        return response()->json($category);
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
        $category=TopikKategori::find($id);

        return response()->json($category);
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
        $category = TopikKategori::find($id);
                $category->update([
                    'name'  => $request->name,
                    'slug'  => Str::slug($request->name),
                ]);
        return response()->json($category);
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
