<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;

//use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', function () {
    return view('Upload.upload');
})->name('upload');


Route::post('upload1', function (Request $request) {
    //return view('Upload.upload');
    /*$uploadedFileUrl = Cloudinary::upload($request->file('monImages')->getRealPath(),[
        'folder'=>'TestFolder'
    ])->getSecurePath();
    dd($uploadedFileUrl);*/
    
    $rec = $request->monImages;
    foreach($request->monImages as $req){
        $uploadedFileUrl = Cloudinary::upload($req->getRealPath(),[
            'folder'=>'TestFolder'
        ])->getSecurePath();
        echo $uploadedFileUrl.'<br />';
    }
    //dd($rec);
})->name('uploadpost1');

Route::post('upload',[PostsController::class,'indexUpload'])->name('uploadpost');

/*Route::get('/head', function () {
    return view('layoutss/header');
});*/
Route::get('heade',[PostsController::class,'index'])->name('headOk');
Route::get('index1',[PostsController::class,'index1'])->name('index1');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/dash1', function () {
    return view('dash');
})->middleware(['auth'])->name('dash');

require __DIR__.'/auth.php';
