<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;//to get file excute here

class PostControl extends Controller
{
    public function index()
    {
        //the next command considered collectio object contain objects
        $postsFromDB=post::all();//not for me to write but from DB directly
        /* dd($postsFromDB); */
        //we need to create table in database
        //id,title,description,created at
        /* $allPostes=[
            ['id'=>1 ,'Title'=>'php','Posted by'=>'Abdallah','Created at'=>'2024-09-01'],
            ['id'=>2 ,'Title'=>'C++','Posted by'=>'Abdallah','Created at'=>'2024-08-01'],
            ['id'=>3 ,'Title'=>'C','Posted by'=>'Abdallah','Created at'=>'2024-08-24'],
            ['id'=>4 ,'Title'=>'python','Posted by'=>'Abdallah','Created at'=>'2024-08-29']
        ];//static data */
        return view('posts.index' ,['posts' => $postsFromDB]);//get from folder name postes the file is index

    }

    public function show($postId){
        //create dynamic data
        //select * from postswhere id =$postId
        $singlePostFromDB=post::find($postId);//small object or model object
        /* $singlePostFromDB=post::where('id',$postId)->first();//model object to get first value
        $singlePostFromDB=post::where('id',$postId)->get();//collection object to get all value */
        /* $singlePoste=[//static data
            'id'=>1 ,'Title'=>'php','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01'
            /* ['id'=>2 ,'Title'=>'C++','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-01'],
            ['id'=>3 ,'Title'=>'C','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-24'],
            ['id'=>4 ,'Title'=>'python','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01']
        ];
        */

    return view('posts.show',['post'=>$singlePostFromDB]);
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

    public function update(){
    //1-get the data from user
    $title=request()->title;
    $description=request()->description;
    $id=request()->creator_id;
    /* dd($title,$description,$id); */

    //2-update data from user to database

    //3-then redirection to posts.show
    return to_route(route:'posts.show', parameters:1);
        /* return view('posts.edit'); */
    }

    public function destroy(){
        //1-delet form from database




        //2-then redirection to posts.index
        return to_route(route:'articals.index');//after delet form go to the main page with this post
    }

}
