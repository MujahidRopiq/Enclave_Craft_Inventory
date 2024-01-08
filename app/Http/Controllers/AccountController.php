<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class AccountController extends Controller
{
    public function index() {
        $id = Auth()->user()->id;
        $data = User::find($id);
        return view('user.myaccount', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $id = Auth()->user()->id;
        $data = User::findOrFail($id);
        $data->name=$request->name;
        $data->email=$request->email;

        $rules=[];
        if ($request->file('image')) {
            $rules = array_merge($rules, [
                'image' => 'required|file|image|max:1024',
                'image_old' => 'required'
            ]);
        }

        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $filename=date('YmdHi').$file->getClientOriginalName();
        //     $file->storeAs('img/avatars', $filename);
        //     $data['image']=$filename;
        // }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if (File::exists('img/avatars/' . $request->image_old)) {
                File::delete('img/avatars/' . $request->image_old);
            }
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('img/avatars', $image_name);
            $validatedData['image'] = $image_name;
        }

        $data->update($validatedData);

        return redirect()->back()->with('success', 'Perubahan berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
