<?php

namespace App\Http\Controllers;

use App\Models\CompanyCredential;
use App\Models\HomePage;
use App\Models\Photo;
use Illuminate\Http\Request;
use Image;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $credential = HomePage::latest()->first();
        $photos = Photo::where('home_page_id', $credential->id)->get();
        return view('admin.pages.home', compact('credential', 'photos'));
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

        $creditential->input_1 = $request->input_1;
        $creditential->input_2 = $request->input_2;
        $creditential->input_3 = $request->input_3;
        $creditential->input_4 = $request->input_4;
        $creditential->input_5 = $request->input_5;
        $creditential->input_6 = $request->input_6;
        $creditential->input_7 = $request->input_7;
        $creditential->input_8 = $request->input_8;
        $creditential->input_9 = $request->input_9;
        $creditential->input_10 = $request->input_10;

        $creditential->text_1 = $request->text_1;
        $creditential->text_2 = $request->text_2;
        $creditential->text_3 = $request->text_3;
        $creditential->text_4 = $request->text_4;
        $creditential->text_5 = $request->text_5;
        $creditential->text_6 = $request->text_6;
        $creditential->text_7 = $request->text_7;
        $creditential->text_8 = $request->text_8;
        $creditential->text_9 = $request->text_9;
        $creditential->text_10 = $request->text_10;

        $creditential->photo_1 = $request->photo_1;
        $creditential->photo_2 = $request->photo_2;
        $creditential->photo_3 = $request->photo_3;
        $creditential->photo_4 = $request->photo_4;
        $creditential->photo_5 = $request->photo_5;
        $creditential->photo_6 = $request->photo_6;
        $creditential->photo_7 = $request->photo_7;
        $creditential->photo_8 = $request->photo_8;
        $creditential->photo_9 = $request->photo_9;
        $creditential->photo_10 = $request->photo_10;

        $creditential->update();

        $photos = Photo::where('home_page_id', $creditential->id)->get();
        foreach ($photos as $photo){
            $photo->delete();
        }

        for ($i = 1; $i <= 10; $i++ ){
            if($file = $request->file('photo_' . $i)){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/form_credentials', $name);
                $path =  'images/form_credentials/' . $name;
                $image = Image::make($path);
                $image->resize(250,250);
                $image->save('images/form_credentials/' . $name);
                Photo::create(['file'=>$name, 'home_page_id'=>$creditential->id]);
            }
        }


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
