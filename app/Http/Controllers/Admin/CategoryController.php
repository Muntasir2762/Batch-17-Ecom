<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory ()
    {
        return view('admin.category.create');
    }

    public function storeCategory (Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){
            $imageName = rand().'-category.'.$request->image->extension(); //8767898-category.png
            $request->image->move('admin/category/', $imageName);

            $category->image = $imageName;
        }

        $category->save();

        toastr()->success('Category Created Successfully!');
        return redirect()->back();
    }

    public function listCategory ()
    {
        $categories = Category::get();
        return view('admin.category.list', compact('categories'));
    }

    public function deleteCategory ($id)
    {
        $category = Category::find($id);

        if($category->image && file_exists('admin/category/'.$category->image)){
            unlink('admin/category/'.$category->image);
        }

        $category->delete();

        toastr()->success('Category Deleted Successfully!');
        return redirect()->back();
    }
}
