<?php

namespace Modules\Services\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Requests\ServiceRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $services = Service::all();
        return view('services::index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('services::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceRequest $request)
    {
        $validated = $request->all();
        try {
            DB::beginTransaction();
            $validated['slug'] = Str::slug($validated['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $service = Service::create($validated);
            if ($request->hasFile('image')) {
                $validated['image'] = $service->addMediaFromRequest('image')->toMediaCollection('images');
                $service->update($validated);
            }
            DB::commit();
            return redirect()->route('service.index')->with('success', 'Services Created Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Store Services');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Service $service)
    {
        return view('services::show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Service $service)
    {
        return view('services::edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $validatedData = $request->all();
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $validatedData['image'] = $service->addAllMediaFromRequest('image')->toMediaCollection('images');
            }
            $validatedData['slug'] = Str::slug($validatedData['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $service->update($validatedData);
            DB::commit();
            return redirect()->route('service.index')->with('success', 'Services Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Update Services');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('service.index')->with('success', 'Service Deleted Successfully');
        } catch (Exception $e) {
            return back()->with('failed', 'Cannot Delete Services');
        }
    }
}
