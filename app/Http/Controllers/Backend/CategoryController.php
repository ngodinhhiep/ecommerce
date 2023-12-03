<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable) {
        
        return $dataTable->render('admin.category.index');
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'max:200', 'unique:categories,name'],
            'icon' => ['required', 'not_in:empty'],
            'status' => ['required']
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->status = $request->status;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr('Created successfully!', 'success');

        return redirect()->route('admin.category.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id) {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'name' => ['required', 'max:200', 'unique:categories,name,'.$id],
            'icon' => ['required', 'not_in:empty'],
            'status' => ['required']
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->status = $request->status;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr('Updated successfully!', 'success');

        return redirect()->route('admin.category.index');

    }

    public function destroy(string $id) {
        $category = Category::findOrFail($id);

        $category->delete();

        return response([
            'status' => 'success', 'Deleted successfully!'
        ]);
    }
 }
