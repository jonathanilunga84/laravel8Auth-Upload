<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Photos;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->only(['index']);
        $this->middleware('auth')->except(['index1']);
    }
    public function index(Request $request){
        
        $userInfos = Auth::user();
        //dd($userIfos);
        $ct = "merci";
        return view('layoutss.header', compact("userInfos"));
    }
    public function indexUpload(Request $request){
        $request->validate([
            'monImages' => 'required'
        ]);

        if ($request->hasfile('monImages')){
           $images = $request->file('monImages');
            //dd($images);
           //$ct = count($images);
          // dd($ct);
          //$tb = [];
            foreach($images as $image){
                //return "un image Exite-- ".$image;
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $finaleName = 'CLD_'.str::random(3).'_'.time().'.'.$extension;
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(),[
                    'public_id'=>$finaleName, //le nom donnees au fichier
                    'folder'=>'TestFolder'//le dossier qu'on vas mettre le fichier
                ])->getSecurePath();
                //$image->storeAs('public/images', $finaleName);
                Photos::create([
                    'user_id'=>auth::user()->id,
                    'images'=>$uploadedFileUrl //$finaleName
                ]);
                //$tb = $image;
                //dd($image);
                //echo $uploadedFileUrl.'<br/>';
               // echo auth::user()->id;
            }
            $img = Photos::all();
            return view('dashboard', compact('img'));
            //echo "<a href="{{route('dashboard')}}">Retour</a>";
            /*for($i=0; $i<$ct; $i++){
               // dd($i);
               echo $i;
            }*/
        }else{
            return "Pas de Photo(s)";
        }
    }
}
