<?php

namespace Codecrewinfotech\FormBuilder\Http\Controllers;

use App\Http\Controllers\Controller;
use Codecrewinfotech\FormBuilder\Models\formBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class formBuilderController extends Controller
{
    public function index()
    {
        return view('formBuilder::formBuilder.page.index');
    }

    public function saveForm(Request $request)
    {
        try {

            Log::info('Your message or log data here');

            $slug = Str::slug($request['formName']);
            $formSave = formBuilder::create([
                'formName' => $request['formName'],
                'key' => $slug,
                'elements' => $request['fullform'],
            ]);

            return response()->json([
                'success' => 'successfully generate form',
            ]);

        } catch (\Exception $e) {

            Log::error('Error in: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'An error occurred']);
        }
        // var_dump($request['formName']);

    }
}
