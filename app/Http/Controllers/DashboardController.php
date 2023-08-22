<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use App\Models\Topik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $topic = Topik::orderBy('id', 'DESC')->paginate(5);
        $saved = new Saved();
        return view('pages.index', compact('topic', 'saved'));
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

        return view('pages.search', compact('topic'));
    }
}
