<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PhotoController extends Controller
{
   	private $table ='photos';
   
    //store gallery
    public function create($gallery_id){
        //check use logged in 
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
        // render view 
        return view('photo/create',compact('gallery_id')); 

    }
    public function store(Request $request){
            //Get request Input
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        //Check Image uploaded
        if($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        } else {
            $cover_image_filename = 'noimage.jpg';
        }

        //INSERT photo
        DB::table($this->table)->insert(
                [
                    'title'          => $title,
                    'description'   =>  $description,
                    'location'      =>  $location,
                    'gallery_id'    =>  $gallery_id,
                    'image'         =>  $image_filename,
                    'owner_id'      => $owner_id,
                     'created_at'   => \Carbon\Carbon::now(),
                     'updated_at'   => \Carbon\Carbon::now()
                ]
            );

        //set message
        \Session::flash('message','Photo Added');
        //Redirect
        return \Redirect::route('gallery.show',array('id'=> $gallery_id));
    }

    //show gallery
    public function details($id){
    	//get Photo 
        $photo = DB::table($this->table)->where('id',$id)->first();

        //render template
        return view('photo/details',compact('photo'));
    }
}
