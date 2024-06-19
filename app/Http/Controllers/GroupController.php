<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the groups.
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new group.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created group in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255|unique:groups',
        ]);

        if ($validator->fails()) {
            return redirect('groups/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Group::create($request->all());

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified group.
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified group.
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified group in storage.
     */
    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255|unique:groups,type,' . $group->id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('groups.edit', $group->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $group->update($request->all());

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    /**
     * Remove the specified group from storage.
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
