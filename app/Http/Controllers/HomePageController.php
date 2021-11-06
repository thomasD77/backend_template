<?php

namespace App\Http\Controllers;

use App\Models\CompanyCredential;
use App\Models\Content;
use App\Models\HomePage;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class HomePageController extends Controller
{
    public $homeCount = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $credential = HomePage::query()
            ->latest()
            ->first();

        $photos = Photo::query()
            ->where('home_page_id', $credential->id)
            ->get();

        $contents = Content::all();

        return view('admin.pages.home', compact('credential', 'photos', 'contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $creditential = HomePage::findOrFail($id);

        for ($i = 1; $i <= $this->homeCount; $i++ )
        {
            $input = 'input_' . $i;                                                                                     //Update all input records
            $creditential->$input = $request->$input;
            $creditential->update();
        }


        for ($i = 1; $i <= $this->homeCount; $i++ )
        {
            $text = 'text_' . $i;                                                                                       //Update all text records
            $creditential->$text = $request->$text;
            $creditential->update();
        }

        $photos = Photo::query()                                                                                        //Get all photos from Home Page
        ->where('home_page_id', $creditential->id)
            ->get();

        if($photos->isEmpty())                                                                                          //Script pictures for First time running
        {
            for ($i = 1; $i <= $this->homeCount; $i++ )
            {
                if ($file = $request->file('photo_' . $i))
                {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/content', $name);

                    $width = 'pictWidth' . $i;
                    $height = 'pictHeight' . $i;

                    if ($request->$width && $request->$height != null)                                                  //Script for customize size
                    {
                        $path = 'images/content/' . $name;
                        $image = Image::make($path);
                        $image->resize($request->$width , $request->$height);
                        $image->save('images/content/' . $name);
                        Photo::create([
                            'file' => $name,
                            'home_page_id' => $creditential->id,
                            'WxH' => $request->$width . 'x' . $request->$height,
                        ]);
                    }
                    else
                    {
                        Photo::create([
                            'file' => $name,                                                                             //Script for original size
                            'home_page_id' => $creditential->id,
                        ]);
                    }

                }
                elseif ($request->file('photo_' . $i) == null)
                {
                    Photo::create(['file' => 'http://placehold.it/62x62', 'home_page_id' => $creditential->id]);         //We make default records to set the position
                }                                                                                                       //of the pictures
            }
        }
        else
        {
            for ($i = 1; $i <= $this->homeCount; $i++)                                                                  //Script pictures after first time running
            {
                $photo = Photo::findOrFail($i);
                if ($file = $request->file('photo_' . $i))
                {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/content', $name);

                    $width = 'pictWidth' . $i;
                    $height = 'pictHeight' . $i;

                    if ($request->$width && $request->$height != null)                                                  //Script for customize size
                    {
                        $path = 'images/content/' . $name;
                        $image = Image::make($path);
                        $image->resize($request->$width , $request->$height);
                        $image->save('images/content/' . $name);
                    }
                    //Update the Picture
                    $photo->file = $name;
                    $photo->home_page_id = $creditential->id;
                    $photo->WxH = $request->$width . 'x' . $request->$height;
                }

                $is_active = 'is_active' . $i;                                                                          //Set status for picture
                if($request->$is_active != null)
                {
                    $photo->is_active = 1;
                }
                else
                {
                    $photo->is_active = 'null';
                }
                $photo->update();
            }
        }

        Session::flash('flash_message', 'Your Home Page Builder is Updated');


        return redirect('/admin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
