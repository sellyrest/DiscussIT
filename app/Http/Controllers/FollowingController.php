<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Following;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Following;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $follows = Following::where('user_id', Auth::user()->id)
                ->orderBy('id', 'DESC')
                ->get();

            return response()->json([
                'follows' => $follows
            ]);
        } else {
            return view('pages.follows');
        }
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|integer',
            'follower_id' => 'required|integer',
        ]);

        // Check if the following record exists
        $follows = Following::where('user_id', $request->user_id)
            ->where('follower_id', $request->follower_id)
            ->exists();

        if ($follows) {
            // If following record exists, delete it
            Following::where('user_id', $request->user_id)
                ->where('follower_id', $request->follower_id)
                ->delete();

            return response()->json([
                'status' => 0,
                'message' => 'Unfollow',
            ]);
        } else {
            // If following record doesn't exist, create it
            Following::create([
                'user_id' => $request->user_id,
                'follower_id' => $request->follower_id,
            ]);

            return response()->json([
                'status' => 1,
                'message' => 'Follow',
            ]);
        }
    }
}