<?php

namespace App\Http\Controllers;

use App\Enums\Store\Theme;
use App\Http\Requests\ThemeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::cases();
        return view('admin.themes.index', ['themes' => $themes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTheme(ThemeUpdateRequest $request)
    {
        // $request->validate([
        //     'theme' => ['required', 'in:'. implode(',', Theme::cases())],
        // ]);



        if (in_array($request->theme, Theme::values())) {


            if ($request->theme == Theme::DEFAULT->value) {
                tenant()->theme  = '';
            } else {
                tenant()->theme  = $request->theme;
            }
            tenant()->save();

            return Redirect::route('admin.themes.index')->with('OkToast', __('messages.theme updated'));
        }
        return Redirect::route('admin.themes.index')->with('OkToast', __('messages.theme updated'));





        //ThemeUpdateRequest
    }
}
