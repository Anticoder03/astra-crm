<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show($module)
    {
        $formLayouts = config('form_layouts');

        if (!array_key_exists($module, $formLayouts)) {
            abort(404, 'Form layout not found.');
        }

        $formData = $formLayouts[$module];

        return view('forms.dynamic_form', [
            'module' => $module,
            'formData' => $formData
        ]);
    }
}
