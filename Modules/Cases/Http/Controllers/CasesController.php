<?php

namespace Modules\Cases\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Cases\Entities\Cases;
use Modules\Cases\Entities\Category;
use Modules\Cases\Http\Requests\CasesRequest;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cases = Cases::all();
        return view('cases::cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('cases::cases.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CasesRequest $request)
    {
        try {
            DB::beginTransaction();
            $validateCase = $request->all();
            $validateCase['slug'] = Str::slug($validateCase['case_name'] . '-' . date('d-m-Y') . rand(0, 99), '-');
            $case = Cases::create($validateCase);
            if ($request->hasFile('image')) {
                $validateCase['image'] = $case->addMediaFromRequest('image')->toMediaCollection('images');
                $case->update($validateCase);
            }
            DB::commit();
            return redirect()->route('cases.index')->with('success', 'Case Created Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Create Case');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Cases $case)
    {
        return view('cases::cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Cases $case)
    {
        $categories = Category::all();
        return view('cases::cases.edit', compact('case', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param CasesRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CasesRequest $request, Cases $case)
    {
        try {
            DB::beginTransaction();
            $validateData = $request->all();
            $validateData['slug'] = Str::slug($validateData['case_name'] . '-' . date('d-m-Y') . rand(0, 99), '-');
            if ($request->file('image')) {
                $validateData['image'] = $case->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $case->update($validateData);
            DB::commit();
            return redirect()->route('cases.index')->with('success', 'Cases Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('failed', 'Cannot Update Case');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Cases $case)
    {
        try {
            $case->delete();
            return redirect()->route('cases.index')->with('success', 'Cases Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('failed', 'Cannot Delete Case');
        }
    }
}
