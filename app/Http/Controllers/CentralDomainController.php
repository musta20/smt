<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentralDomainController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function setLocale(Request $request)
    {
        $locale = $request->locale;

        if (in_array($locale, config('app.available_locales'))) {

            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
