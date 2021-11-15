<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)   {
        $show = Client::create($request->validated());
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   {
        $clients = Client::findOrFail($id);
        return view('clients.show',compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   {
        $clients = Client::findOrFail($id);
        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateClientRequest  $request
     * @param  Client $cilents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)  {
        $clients->update($request->validated());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)  {

        $clients->delete();
        return redirect()->route('clients.index');
    }
}
