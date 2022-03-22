<?php

namespace Modules\Slider\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider::index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('slider::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request)
    {
        $validated = $request->all();
        try {
            $slider = Slider::create($validated);
            if ($request->file('image')) {
                $validated['image'] = $slider->addMediaFromRequest('image')->toMediaCollection('images');
                $slider->update($validated);
            }
            return redirect()->route('slider.index')->with('success', 'Slider Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Store Slider');
        }
    }

    /**
     * Show the specified resource.
     * @param Slider $slider
     * @return Renderable
     */
    public function show(Slider $slider)
    {
        return view('slider::show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Slider $slider
     * @return Renderable
     */
    public function edit(Slider $slider)
    {
        return view('slider::edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->all();
        $slider = Slider::findOrFail($id);
        try {
            if ($request->file('image')) {
                $validated['image'] = $slider->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $slider->update($validated);
            return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Update Slider');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            return redirect()->route('slider.index')->with('success', 'Slider Deleted Successfully');
        } catch (Exception $e) {
            return back()->with('failed', 'Cannot Delete Slider');
        }
    }
}
