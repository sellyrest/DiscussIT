<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Topik;
use App\Models\User;
use Illuminate\Http\Request;

class Report extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->report=='users') {
                $report = User::withCount('report')
                    ->having('report_count', '!=', 0)
                    ->orderByDESC('report_count');
            }
            if ($request->report=='topiks') {
                $report = Topik::withCount('report')
                    ->having('report_count', '!=', 0)
                    ->orderByDESC('report_count');
            }
            if ($request->report=='responses') {
                $report = Response::withCount('report')
                    ->having('report_count', '!=', 0)
                    ->orderByDESC('report_count');
            }
            $search = $request->search;
            if ($search) {
                $report = $report->where('content', 'like', '%'.$search.'%')
                ->orWhereHas('user', function($q) use($search) {
                    $q->where('username', 'like', '%'.$search.'%');
                })
                ->orWhereHas('report', function($q) use($search) {
                    $q->where('reason', 'like', '%'.$search.'%');
                });
            }
            $report = $report->paginate(10);
            return view('pages.admin.includes.report-list', compact('report'));
        }
        return view('pages.admin.report');
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
        if ($request->table_name =='users') {
            $report = User::find($id);
            $report->status = $request->status;
            $report->save(); 
        }
        if ($request->table_name =='topiks') {
            $report = Topik::find($id);
            $report->status = $request->status;
            $report->save(); 
        }
        if ($request->table_name =='responses') {
            $report = Response::find($id);
            $report->status = $request->status;
            $report->save(); 
        }
        return response()->json([
            'status'    => true,
            'message'   => 'Response Updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Response::find($id);
        $report->delete();
            return response()->json([
                'status'    => true,
            ]);
    }
}