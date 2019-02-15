<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
 
class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());

        return response()->json($client, 201);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return response()->json($client, 200);
    }

    public function delete(Client $client)
    {
        $client->delete();

        return response()->json(null, 204);
    }
}



