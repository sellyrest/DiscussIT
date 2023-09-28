<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = Response::where('topic_id', $request->topic_id)
            ->where('status', 1)
            ->where('parent_id', 0)
            ->orderBy('id', 'DESC')
            ->with('children')
            ->paginate(5);
            
        return view('pages.includes.response-list', compact('response'));
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'content' => ['required', 'min:3']
        ],
        [
            'content.required' => 'Content Harus Diisi',
            'content.min'      => 'Content Harus :min Karakter!'
        ]);
        if ($validator->fails()){
            return response()->json([
                'status'    => 0,
                'data'      => $validator->errors()
            ]);
        }
        $response = Response::create([
            'user_id'   => $request->user_id,
            'topic_id'   => $request->topic_id,
            'content'   => $request->content,
            'parent_id' => $request->parent_id
        ]);
        return response()->json([
            'status'    => 1,
            'message'   => 'Response has been sent!',
        ]);
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
