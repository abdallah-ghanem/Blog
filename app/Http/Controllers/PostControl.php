<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostControl extends Controller
{
    public function index()
    {
        $allPostes=[
            ['id'=>1 ,'Title'=>'php','Posted by'=>'Abdallah','Created at'=>'2024-09-01'],
            ['id'=>2 ,'Title'=>'C++','Posted by'=>'Abdallah','Created at'=>'2024-08-01'],
            ['id'=>3 ,'Title'=>'C','Posted by'=>'Abdallah','Created at'=>'2024-08-24'],
            ['id'=>4 ,'Title'=>'python','Posted by'=>'Abdallah','Created at'=>'2024-08-29']
        ];
        return view('posts.index' ,['posts' => $allPostes]);//get from folder name postes the file is index

    }

    public function show($postId){

        $singlePoste=[
            'id'=>1 ,'Title'=>'php','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01'
            /* ['id'=>2 ,'Title'=>'C++','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-01'],
            ['id'=>3 ,'Title'=>'C','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-24'],
            ['id'=>4 ,'Title'=>'python','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01'] */
        ];

    return view('posts.show',['post'=>$singlePoste]);
}

    public function create(){
        return view('posts.create');
    }
    public function store(){
        //1-get the data from user
        /* $data=$_POST;
        return $data; */
        /* $request=request();
        dd($request->title,$request->all());//dd puse excution by this line and show the intern
        dd($request);//to show all methods intier this object */
        $data=request()->all();
        /* return $data; */
        $title=request()->title;//to spilit or show on of them and title that name taken from html code from name
        /* dd($data,$title); */

        //2-store data from user to database


        //3-then redirection to posts.index
        return to_route(route:'articals.index');//redirection to posts.index
        //view('posts.store');
    }

    public function edit(){

        return view('posts.edit');
    }

}
