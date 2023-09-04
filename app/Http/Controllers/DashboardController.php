<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use App\Models\Topik;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $topuser = User::withCount('topik')
            ->having('topik_count', '!=', 0)
            ->orderByDESC('topik_count')
            ->take(5)
            ->get();
        $topic = Topik::orderBy('id', 'DESC')->paginate(5);
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

        return view('pages.search', compact('topic'));
    }
}
