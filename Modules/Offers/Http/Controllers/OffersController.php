<?php

namespace Modules\Offers\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Offers\Entities\Offer;
use Modules\Offers\Http\Requests\OfferRequest;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offers::index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('offers::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param OfferRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfferRequest $request)
    {
        try {
            $validateData = $request->all();
            $validateData['slug'] = Str::slug($validateData['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $offer = Offer::create($validateData);
            if ($request->hasFile('image')) {
                $validateData['image'] = $offer->addMediaFromRequest('image')->toMediaCollection('images');
                $offer->update($validateData);
            }
            return redirect()->route('offer.index')->with('success', 'Offer Created Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Offer Cannot Be Create');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Offer $offer)
    {
        return view('offers::show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\Offers\Entities\Offer $offer
     * @return Renderable
     */
    public function edit(Offer $offer)
    {
        return view('offers::edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Offer $offer)
    {
        try {
            $validateData = $request->all();
            if ($request->hasFile('image')) {
                $validateData['image'] = $offer->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $validateData['slug'] = Str::slug($validateData['name'] . '-' . date('Y-m-d') . rand(0, 99), '-');
            $offer->update($validateData);
            return redirect()->route('offer.index')->with('success', 'Offer Updated Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Offer Cannot Be Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offer $offer)
    {
        try {
            $offer->delete();
            return redirect()->route('offer.index')->with('success', 'Offer Deleted Successfully');
        } catch (Exception $exception) {
            return back()->with('failed', 'Cannot Delete Offer');
        }
    }
}
