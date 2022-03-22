<?php

namespace Modules\Performance\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Performance\Entities\Performance;
use Modules\Performance\Http\Requests\PerformanceRequest;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $performances = Performance::all();
        return view('performance::index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('performance::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PerformanceRequest $request
     * @return RedirectResponse
     */
    public function store(PerformanceRequest $request)
    {
        try {
            $data = $request->all();
            $performance = Performance::create($data);
            if ($request->file('image')) {
                $data['image'] = $performance->addMediaFromRequest('image')->toMediaCollection('images');
                $performance->update($data);
            }
            return redirect()->route('performance.index')->with('success', 'Performance Successfully Created!');
        } catch (Exception $e) {
            return back()->with('failed', 'Cannot Added Performance.');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Performance $performance)
    {
        return view('performance::show', compact('performance'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Performance $performance)
    {
        return view('performance::edit', compact('performance'));
    }

    /**
     * Update the specified resource in storage.
     * @param PerformanceRequest $request
     * @param Performance $performance
     * @return RedirectResponse
     */
    public function update(PerformanceRequest $request, Performance $performance)
    {
        try {
            $input = $request->all();
            DB::beginTransaction();
            if ($request->file('image')) {
                $input['image'] = $performance->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $performance->update($input);
            DB::commit();
            return redirect()->route('performance.index')->with('success', 'Performance Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Performance Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Performance $performance
     * @return RedirectResponse
     */
    public function destroy(Performance $performance)
    {
        try {
            DB::beginTransaction();
            $performance->delete();
//            Storage::delete($blog->image);
            DB::commit();
            return redirect()->route('performance.index')->with('success', 'Performance Deleted Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Performance Cannot Be Deleted');
        }
    }
}
