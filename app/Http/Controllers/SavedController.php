<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saved = Saved::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(5);
        return view('pages.saved', compact('saved'));
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
        $saved = Saved::where('user_id', $request->user_id)
            ->where('topic_id', $request->topic_id)
            ->first();
        if ($saved) {
            $saved->delete();
            return response()->json([
                'status' => 0,
                'message' => 'You Unliked This Topic',
            ]);
        } else {
            $saved = Saved::create([
                'user_id' => $request->user_id,
                'topic_id' => $request->topic_id,
            ]);
            return response()->json([
                'status' => 1,
                'message' => 'You liked This Topic',
            ]);
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
        //
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
