<?php

namespace Modules\About\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\About\Entities\About;
use Modules\About\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $abouts = About::all();
        return view('about::index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('about::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param AboutRequest $request
     * @return RedirectResponse
     */
    public function store(AboutRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['slug'] = Str::slug($input['title'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $about = About::create($input);
            if ($request->hasFile('image')) {
                $input['image'] = $about->addMediaFromRequest('image')->toMediaCollection('images');
                $about->update($input);
            }
            DB::commit();
            return redirect()->route('about.index')->with('success', 'About Us Created Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Add About Us');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(About $about)
    {
        return view('about::show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(About $about)
    {
        return view('about::edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     * @param AboutRequest $request
     * @param About $about
     * @return RedirectResponse
     */
    public function update(AboutRequest $request, About $about)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->hasFile('image')) {
                $input['image'] = $about->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $input['slug'] = Str::slug($input['title'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $about->update($input);
            DB::commit();
            return redirect()->route('about.index')->with('success', 'About Us Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Update About Us');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(About $about)
    {
        try {
            $about->delete();
            return redirect()->route('about.index')->with('success', 'About Us Deleted Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Delete About Us');
        }
    }
}
