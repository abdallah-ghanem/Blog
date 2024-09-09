<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;//to get file excute here this post use down in public function the first word
use App\Models\User;


class PostControl extends Controller
{
    public function index()
    {
        //the next command considered collectio object contain objects
        $postsFromDB=post::all();//not for me to write but from DB directly //This line of code retrieves all records from the posts table in your database and stores them in the $postsFromDB variable.
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


    public function show(post $post){//type hinting that make you saving to write code where that the first Post is type of operation
        //create dynamic data
        //select * from postswhere id =$postId
        //$singlePostFromDB=post::find($postId);
        //$singlePostFromDB=post::findOrFail($postId);//small object or model object
        /* $singlePostFromDB=post::where('id',$postId)->first();//model object to get first value
        $singlePostFromDB=post::where('id',$postId)->get();//collection object to get all value */
        /* $singlePoste=[//static data
            'id'=>1 ,'Title'=>'php','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01'
            /* ['id'=>2 ,'Title'=>'C++','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-01'],
            ['id'=>3 ,'Title'=>'C','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-08-24'],
            ['id'=>4 ,'Title'=>'python','Description'=> 'THIS is Test Description','Posted by'=>'Abdallah','Created at'=>'2024-09-01']
        ];
        */
        /* if(is_null($singlePostFromDB)){//use this or findOrFail
            return to_route(route:'articals.index');
        } */
    return view('posts.show',['post'=>$post]);
}


    public function create(){
        $users=User::all();//from file called youser located at app models get data from him
        return view('posts.create',['users'=>$users]);//practical inside user to pass variable call method to file .blade.php
    }


    public function store(){
//write code to validate the data
request()->validate([//to make validate make use must add value to title abd description and make min for charater
    'title'=>['required','min:3'],
    'description'=>['required','min:15'],
    'creator_id'=>['required','exists:users,id'],//this code to check id if he exist in file users or not if exist search it in row id
]);

        //1-get the data from user
        /* $data=$_POST;
        return $data; */
        /* $request=request();
        dd($request->title,$request->all());//dd puse excution by this line and show the intern
        dd($request);//to show all methods intier this object */
        $data=request()->all();
        //dd($data);
        /* return $data; */

        //this block to call data from .blade.php
        $title=request()->title;//to spilit or show on of them and title that name taken from html code from name
        $description=request()->description;
        $creator=request()->creator_id;//take this variable from name of object or buttom .blade.php
        /* dd($data,$title); */

        //2-store data from user to database
        //First method to store data in DB
        /* $post = new post;//excute new colume in DB called post

        $post->title = $title;
        $post->description = $description;

        $post->save(); */

        $post=Post::create([//secound method to store data in DB
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$creator,
        ]);
        //3-then redirection to posts.index
        return to_route('articals.index');//redirection to posts.index
        //view('posts.store');
    }

    public function edit(Post $post){//to get information from DBs
        $users=User::all();
        return view('posts.edit',['users'=>$users ,'post'=>$post]);//to make create post dynamic
    }//then pass this data to view page (user and post)


    public function update($postId){
//validate error in update data
request()->validate([//to make validate make use must add value to title abd description and make min for charater
    'title'=>['required','min:3'],
    'description'=>['required','min:15'],
    'creator_id'=>['required','exists:users,id'],//this code to check id if he exist in file users or not if exist search it in row id
]);


        //dd($postId);
    //1-get the data from user
    $title=request()->title;
    $description=request()->description;
    $id=request()->creator_id;
    /* dd($title,$description,$id); */

    //2-update data from user to database
    $singlePostFromDB=post::find($postId);//find the post
    $singlePostFromDB->update([
        'title'=>$title,
        'description'=>$description,
        'user_id'=>$id,//the name in left from DB and name in right from variable above and get it from file .blade.php
        ]);
    /* dd($singlePostFromDB); */
    //update the post data
    //3-then redirection to posts.show
    return to_route('posts.show', $postId);
        /* return view('posts.edit'); */
    }


    public function destroy($postId){
        //1-delet form from database
         //-get the data from user
        $allPostFromDB=post::find($postId);
         //-delete data from user to database
        $allPostFromDB->delete();
        //2-then redirection to posts.index
        return to_route(route:'articals.index');//after delet form go to the main page with this post
    }

}
