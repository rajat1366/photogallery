<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth; 

class GalleryController extends Controller
{   
    //set tablename
    private $table = 'galleries';
    //List galleries
    public function index(){ 
    	//Get all galaries
        $galleries = DB::table($this->table)->get();
        //render view
    	return view('gallery/index',compact('galleries'));
    }
    //show create form
    public function create(){
        //check if Logged IN
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
    	return view('gallery/create');
    }

    //store gallery
    public function store(Request $request){
        //Get request Input
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        //Check Image uploaded
        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'), $cover_image_filename);
        } else {
            $cover_image_filename = 'noimage.jpg';
        }

        //INSERT into the database
        DB::table($this->table)->insert(
                [
                    'name'          => $name,
                    'description'   =>  $description,
                    'cover_image'   =>  $cover_image_filename,
                    'owner_id'      => $owner_id,
                     'created_at'   => \Carbon\Carbon::now(),
                     'updated_at'   => \Carbon\Carbon::now()
                ]
            );

        //set message
        \Session::flash('message','Gallery Added');
        //Redirect
        return \Redirect::route('gallery.index');
    }

    //show photo details
    public function show($id){
    	$gallery = DB::table($this->table)->where('id',$id)->first();

        $photos = DB::table('photos')->where('gallery_id',$id)->get();
        return view('gallery/show',compact('photos','gallery'));
    }
}
