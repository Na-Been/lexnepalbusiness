<?php

namespace Modules\Blog\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog::blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::blog.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param BlogRequest $request
     * @return RedirectResponse
     */
    public function store(BlogRequest $request)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name'] . '-' . date('d-m-Y') . rand(0, 99), '-');
            $blog = Blog::create($data);
            if ($request->file('image')) {
                $data['image'] = $blog->addMediaFromRequest('image')->toMediaCollection('images');
                $blog->update($data);
            }
            return redirect()->route('blog.index')->with('success', 'Blog Successfully Created!');
        } catch (Exception $e) {
            dd($e);
            return back()->with('failed', 'Cannot Added Blog.');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Blog $blog)
    {
        return view('blog::blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        return view('blog::blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param BlogRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $input = $request->all();
            DB::beginTransaction();
            if ($request->file('image')) {
                $input['image'] = $blog->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $input['slug'] = Str::slug($input['name'] . '-' . date('d-m-Y') . rand(0, 99), '-');
            $blog->update($input);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully');
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();
            return back()->with('failed', 'Blog Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $blog->delete();
//            Storage::delete($blog->image);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Blog Cannot Be Deleted');
        }
    }

}
