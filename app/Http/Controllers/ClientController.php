<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ci' => 'required|string|max:255|unique:clients',
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ]);

        if ($validator->fails()) {
            return redirect('clients/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified client.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'ci' => 'required|string|max:255|unique:clients,ci,' . $client->id,
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ]);

        if ($validator->fails()) {
            return redirect()->route('clients.edit', $client->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
