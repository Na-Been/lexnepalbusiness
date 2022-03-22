<?php

use Modules\Setting\Entities\Setting;

function getSetting($name)
{
    $setting = Setting::pluck('value', 'name');
    return $setting[$name] ?? null;
}
