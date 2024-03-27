<?php

use App\Models\Saved;
use App\Models\Following;

    if(!function_exists('user_saved')) {
        function user_saved($user_id, $topic_id) {     
            $saved = Saved::where('user_id', $user_id)
                ->where('topic_id', $topic_id)
                ->first();
                
            if ($saved) {
                return true;
            } else {
                return false;
            }

        }
    }
    if(!function_exists('user_follows')) {
        function user_follows($user_id, $follower_id) {     
            $follows = Following::where('user_id', $user_id)
                ->where('follower_id', $follower_id)
                ->first();
                
            if ($follows) {
                return true;
            } else {
                return false;
            }

        }
    }
?>