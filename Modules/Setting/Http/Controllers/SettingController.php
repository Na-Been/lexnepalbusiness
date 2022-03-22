<?php

namespace Modules\Setting\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;

class SettingController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index');
    }

    public function store(SettingRequest $request)
    {
        $validateData = $request->except('_token');
        if ($request->hasFile('logo')) {
            $validateData['logo'] = $request->logo->store('public/image');
        } else {
            $setting = Setting::where('name', 'logo')->first();
            if ($setting) {
                if ($setting->value) {
                    $validateData['logo'] = $setting->value;
                }
            }
        }
        try {
            DB::beginTransaction();
            Setting::truncate();
            foreach ($validateData as $key => $value) {
                Setting::insert([
                    'name' => $key,
                    'value' => $value,
                ]);
            }
            DB::commit();
            return redirect()->route('setting.store')->with('success', 'Setting Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('setting.store')->with('error', 'Something Went Wrong While Adding Setting');
        }
    }

}
