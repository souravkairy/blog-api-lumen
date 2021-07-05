<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentTableController extends Controller
{
    public function addComment(request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['user_name'] = $request->user_name;
        $data['blog_id'] = $request->blog_id;
        $data['comment'] = $request->comment;

        $match = DB::table('comment_tables')->insert($data);
        if ($match) {
            return [
                "status" => "success",
                "msg" => "Data Inserted Sccessfully",
            ];
        } else {
            return [
                "status" => "failed",
                "msg" => "Something is worng",
            ];
        }
    }
    public function getCommentByBlog($blog_id)
    {
        $match = DB::table('comment_tables')->where('blog_id', $blog_id)->get();
        if ($match) {
            return $match;
        }

    }

}
