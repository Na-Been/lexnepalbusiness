<?php

namespace Modules\Cases\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Cases\Entities\Cases;
use Modules\Cases\Entities\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('cases::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cases::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        try {
            $validateData['slug'] = Str::slug($validateData['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            Category::create($validateData);
            return redirect()->route('category.index')->with('success', 'Category Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Create Category');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Category $category)
    {
        return view('cases::category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        return view('cases::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);
        try {
            $category = Category::findOrFail($id);
            $validateData['slug'] = Str::slug($validateData['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $category->update($validateData);
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Update Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        try {
            $checkCases = Cases::where('category_id', $category->id)->count();
            if ($checkCases > 0) {
                return redirect()->route('category.index')->with('warning', 'First Delete The Cases Under This Category ');
            }
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Delete Category ');
        }
    }
}
