<?php

use App\Models\Saved;

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
?>