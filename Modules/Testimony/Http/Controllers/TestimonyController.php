<?php

namespace Modules\Testimony\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Testimony\Entities\Testimony;
use Modules\Testimony\Http\Requests\TestimonyRequest;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $testimonies = Testimony::all();
        return view('testimony::index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('testimony::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TestimonyRequest $request
     * @return RedirectResponse
     */
    public function store(TestimonyRequest $request)
    {
        $validated = $request->all();
        try {
            $testimony = Testimony::create($validated);
            if ($request->hasFile('image')) {
                $validated['image'] = $testimony->addMediaFromRequest('image')->toMediaCollection('images');
                $testimony->update($validated);
            }
            return redirect()->route('testimony.index')->with('success', 'Testimony Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Testimony Cannot Create, Something Went Wrong');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Testimony $testimony)
    {
        return view('testimony::show', compact('testimony'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Testimony $testimony)
    {
        return view('testimony::edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     * @param TestimonyRequest $request
     * @param Testimony $testimony
     * @return RedirectResponse
     */
    public function update(TestimonyRequest $request, Testimony $testimony)
    {
        $validated = $request->all();
        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $testimony->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $testimony->update($validated);
            return redirect()->route('testimony.index')->with('success', 'Testimony Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Testimony Cannot Be Update, Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Testimony $testimony)
    {
        try {
            $testimony->delete();
            return redirect()->route('testimony.index')->with('success', 'Testimony Deleted Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Delete Testimony');
        }
    }
}
