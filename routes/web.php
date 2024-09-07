<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostControl;

Route::get('/', function () {
    /* return view('test'); */
    return view('welcome');
});


/*
Route::get('/test_this', function () {//call back function
    /* $localName='Abdo';
    $NewBooks=['Batman','Spiderman'];
    return view('test',['age'=>'24' , 'name'=>$localName ,'books'=>$NewBooks]);
});
 */
/* Route::get('/test_this',[TestController::class,'firstAction']);
Route::get('/test_german',[TestController::class,'greet']);
Route::get('/artical',[TestController::class,'firstAction']); */
Route::get('/articals',[PostControl::class,'index'])->name(name:'articals.index');//-> that mean creat short cut for this
//1- define route so user can access from brwoser
//2- define controllers that reder the view
//3- define the view that contain list of posts
//4- remove any static html data from view

Route::get('/articals/{post}/hfjdgj/dfjgj/stutru/trs',[PostControl::class,'show'])->name(name:'posts.show');//{post} mean any of value is dynamic
//1- define route so user can access from brwoser
//2- define controllers that reder the view (new public function)
//3- define the view that contain list of posts (new page for brwser)
//4- remove any static html data from view ($varible)
/* Route::get('/test/edit',function(){return 'test';}); */

Route::get('/articals/create/',[PostControl::class,'create'])->name(name:'posts.create');
//1- define route so user can access from brwoser
//3- define the view that contain list of posts (new page for brwser)
Route::Post('/articals',[PostControl::class,'store'])->name(name:'posts.store');

Route::get('/articals/{post}/edit',[PostControl::class,'edit'])->name(name:'posts.edit');

Route::put('/articals/{photo}',[PostControl::class,'update'])->name(name:'posts.update');

Route::delete('/articals/{photo}',[PostControl::class,'destroy'])->name(name:'posts.destroy');


//1-structure change of database(creat table,edit colum,remove colum)
//2-operation on database(insert record,delet record,edit record)
//the previos lines mean that only do 2 operation on database change structure or operation
