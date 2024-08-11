<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\FileExists;

class CategoryController extends Controller
{
    public function add_category()
    {
        return view('admin.add_category');
    }


    public function store_category(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_descrip' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);

        // Create a new post instance
        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->description = $request->description;
        $cat->status = $request->status ?? 0;
        $cat->popular = $request->popular ?? 0;

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('pro'), $imageName);
            $cat->image = $imageName;
        }

        // Add meta data
        $cat->meta_title = $request->meta_title;
        $cat->meta_descrip = $request->meta_descrip;
        $cat->meta_keywords = $request->meta_keywords;

        // Save the cat to the database
        $cat->save();

        // Redirect back with a success message
        return back()->withSuccess('Product Category Created Successfully!!!');
    }

    public function category_view()
    {
        $categories=Category::all();
        return view('admin.category_view',compact('categories'));
    }


    public function edit_category($id)
    {
        $category=Category::find($id);
        return view('admin.edit_category',compact('category'));
    }

    public function update_category(Request $request,$id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_descrip' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);
        $cat=Category::find($id);
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->description = $request->description;
        $cat->status = ($request->status) ==TRUE ?'1':'0';
        $cat->popular = ($request->popular) ==TRUE ?'1':'0';

        // Handle the image upload
        if ($request->hasFile('image')) {
            $path = public_path('pro/' . $cat->image);

            if (File::exists($path)) {
                File::delete($path);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('pro'), $imageName);
            $cat->image = $imageName;
        }

        // Add meta data
        $cat->meta_title = $request->meta_title;
        $cat->meta_descrip = $request->meta_descrip;
        $cat->meta_keywords = $request->meta_keywords;

        // Save the cat to the database
        $cat->save();

        // Redirect back with a success message
        return back()->withSuccess('Product Category Updated Successfully!!!');
    }

    public function delete_category($id)
    {
        $category=Category::find($id);

        if ($category->image) {
            $path = public_path('pro/' . $category->image);
    
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return back()->withSuccess('Category Deleted Successfully!!!');
        return redirect()->back();


    }


}
