<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Show index page of categories.
     *
     * @return view
     **/
    public function index()
    {
        $categories = Category::all();
        return view('admin::categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating new category.
     *
     * @return view
     **/
    public function create()
    {
        return view('admin::categories.create');        
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     **/
    public function store(CategoryRequest $request)
    {
        $category = Category::create(['name' => $request->name]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('admin::categories.edit')->with([
            'category' => $category
        ]);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $category->update(['name' => $request->name]);
        return redirect()->route('admin.categories.index');        
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');        
    }
}
