<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $topic = Topik::all();
        return view('pages.index');
    }

    public function getDataTopic(Request $request )
    {
        $topic = Topik::all();
        return view('pages.includes.topic-home', compact('topic'));
    }
}
