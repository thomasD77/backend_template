<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Loyal;
use App\Models\Source;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $loyals = Loyal::pluck('name', 'id')
            ->all();
        $sources = Source::pluck('name', 'id')
            ->all();

        return view('admin.clients.create',compact('loyals', 'sources'));
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
        $client = new Client();
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->remarks = $request->remarks;
        $client->loyal_id = $request->loyal_id;
        $client->source_id = $request->source_id;

        $client->save();

        return redirect('/admin/clients');
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
        $loyals = Loyal::pluck('name', 'id')
            ->all();
        $sources = Source::pluck('name', 'id')
            ->all();

        $client = Client::findOrFail($id);
        return view('admin.clients.show', compact('client', 'loyals', 'sources'));
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
        $client = Client::findOrFail($id);
        $loyals = Loyal::pluck('name', 'id')
            ->all();
        $sources = Source::pluck('name', 'id')
            ->all();

        return view('admin.clients.edit',compact('loyals', 'sources', 'client'));
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
        $client = Client::findOrFail($id);
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->remarks = $request->remarks;
        $client->loyal_id = $request->loyal_id;
        $client->source_id = $request->source_id;

        $client->update();

        return redirect('/admin/clients');
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

    public function archive()
    {
        $clients = Client::where('archived', 1)
            ->latest()
            ->paginate(20);
        return view('admin.clients.archive', compact('clients'));
    }
}
