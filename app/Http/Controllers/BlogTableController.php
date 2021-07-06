<?php

namespace App\Http\Controllers;

use App\Models\blog_table;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\Local;
use Illuminate\Support\Facades\DB;
use App\Models\Blogs;

class BlogTableController extends Controller
{
    public function addBlog(request $request)
    {
        $data['user_id'] = $request->user_id;
        $data['name'] = $request->name;
        $data['content'] = $request->content;
        $data['type'] = 1;
        $fileNameone = $request->file('image')->getClientOriginalName();
        $fileName1 =  $fileNameone;
        $path = 'blogImages' . "/" ;
        $destinationPath = $path; // upload path

        $request->file('image')->move($destinationPath, $fileName1);

        $data['image'] = '/blogImages/' . $fileName1;


        $match = DB::table('blog_tables')->insert($data);
        if ($match) {
            return[
                "status" =>"success",
                "msg" =>"Data Inserted Sccessfully",
            ];
        }
        else{
            return[
                "status" =>"failed",
                "msg" =>"Something is worng",
            ];
        }
    }
    public function blogListByProfile($user_id)
    {
        $match = DB::table('blog_tables')->where('user_id',$user_id)->get();
        if ($match) {
            return $match;
        }

    }
    public function GetAllBlog()
    {
        $match = DB::table('blog_tables')->get();
        if ($match) {
            return $match;
        }

    }
    public function getBlog($id)
    {
        $match = DB::table('blog_tables')->where('id',$id)->get();
        if ($match) {
            return $match;
        }
    }
    public function deleteBlog($id)
    {
        $match = DB::table('blog_tables')->where('id',$id)->delete();
        if ($match) {
            return ["result"=>"Deleted"];
        }
    }
    public function getBlogByidForEdit($id)
    {
        $match = Blogs::find($id);
        if ($match) {
            return $match;
        }
    }
    public function updateBlog($id, request $request)
    {
        // return $request->all();
        $name = $request->name;
        $content = $request->content;



        // $data['name'] = $request->name;
        // $data['content'] = $request->content;
        // $data['user_id'] = $request->user_id;
        // $data['type'] = 1;
        $fileNameone = $request->file('image')->getClientOriginalName();
        $fileName1 =  $fileNameone;
        $path = 'blogImages' . "/" ;
        $destinationPath = $path; // upload path

       $request->file('image')->move($destinationPath, $fileName1);

        $image = '/blogImages/' . $fileName1;


        $match = DB::table('blog_tables')->where('id',$id)->update(['name'=>$name,'image'=>$image,'content'=>$content]);
        if ($match) {
            return ["result"=>"Updated"];
        }
        else{
            return[
                "status" =>"failed",
                "msg" =>"Something is worng",
            ];
        }
    }
}
