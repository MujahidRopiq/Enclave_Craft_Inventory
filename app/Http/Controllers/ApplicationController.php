<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderBy = 'name';
        $order = 'asc';

        switch (request('orderBy')) {
            case 'nameAsc':
                $orderBy = 'name';
                $order = 'asc';
                break;
            case 'nameDesc':
                $orderBy = 'name';
                $order = 'desc';
                break;
            case 'newest':
                $orderBy = 'created_at';
                $order = 'desc';
                break;
            case 'oldest':
                $orderBy = 'created_at';
                $order = 'asc';
                break;
            default:
                $orderBy = 'name';
                $order = 'asc';
                break;
        }

        $show = request('show') ?? '5';
        $applications = Application::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('applications.index', [
            'page' => 'applications',
            'applications' => $applications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create', [
            'page' => 'applications',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:application,name',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Application::create([
            'name' => $req['name'],
        ]);

        return redirect('/applications?orderBy=newest')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $application = Application::find($id);

        if (!$application) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        return view('applications.edit', [
            'page' => 'applications',
            'application' => $application,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $application = Application::find($id);

        if (!$application) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
        ];

        if ($req->name != $application->name) {
            $validatorRules['name'] = 'required|unique:application,name';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $application->update([
            'name' => $req['name'],
        ]);

        $query = str_replace('/applications/' . $id, '', request()->getRequestUri());

        return redirect('/applications/' . $query)->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $application = Application::find($id);

        if (!$application) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $application->delete();

        $query = str_replace('/applications/' . $id, '', request()->getRequestUri());
        return redirect('/applications' . $query)->with('success', 'Kategori berhasil dihapus');
    }
}
