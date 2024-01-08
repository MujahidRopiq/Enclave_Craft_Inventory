<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $orderBy = request('orderBy') ?? 'name';
        $order = request('order') ?? 'asc';
        $show = request('show') ?? '5';
        $categories = Category::filter(request(['search']))->orderBy($orderBy, $order)->paginate($show)->withQueryString();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:category,name',
            'sku' => 'required|unique:category,sku'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Category::create([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        return redirect('/categories?orderBy=created_at&order=desc')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $req, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $validatorRules = [
            'name' => 'required',
            'sku' => 'required',
        ];

        if ($req->name != $category->name) {
            $validatorRules['name'] = 'required|unique:category,name';
        }

        if ($req->sku != $category->sku) {
            $validatorRules['sku'] = 'required|unique:category,sku';
        }

        $validator = Validator::make($req->all(), $validatorRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category->update([
            'name' => $req['name'],
            'sku' => $req['sku']
        ]);

        $query = str_replace('/categories/' . $id, '', request()->getRequestUri());

        return redirect('/categories/' . $query)->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return back()->with('warning', 'Kategori tidak ditemukan');
        }

        $category->delete();

        $query = str_replace('/categories/' . $id, '', request()->getRequestUri());
        return redirect('/categories' . $query)->with('success', 'Kategori berhasil dihapus');
    }
}
