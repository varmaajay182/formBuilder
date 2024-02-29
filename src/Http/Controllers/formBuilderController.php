<?php

namespace Codecrewinfotech\FormBuilder\Http\Controllers;

use App\Http\Controllers\Controller;
use Codecrewinfotech\FormBuilder\Helpers\shortcodeHelper;
use Codecrewinfotech\FormBuilder\Models\formBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class formBuilderController extends Controller
{
    public function index()
    {
        return view('formBuilder::formBuilder.page.index');
    }

    public function formListing(Request $request)
    {
        $successMessage = $request->query('success');

        $generatedforms = formBuilder::get();
        return view('formBuilder::formBuilder.formListing', ['forms' => $generatedforms,'successMessage'=>$successMessage]);
    }

    public function saveForm(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'formName' => 'required',
            'formUrl' => 'required',
            'formId' => 'required',
            'formHtml' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([$validate->errors()], 422);
        }

        try {

            // Log::info('Your message or log data here');

            $slug = Str::slug($request['formName']);
            $shorCode = shortcodeHelper::generateRandomShortcode();
            $formSave = formBuilder::create([
                'formName' => $request['formName'],
                'key' => $slug,
                'url' => $request['formUrl'],
                'formId' => $request['formId'],
                'short_code' => $shorCode,
                'elements' => html_entity_decode($request['formHtml']),
            ]);
            // .();
            return response()->json([
                'success' => 'successfully generate form with shortCode ' . $shorCode,
            ]);

        } catch (\Exception $e) {

            Log::error('Error in: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'An error occurred']);
        }

    }

    public function formDesign(Request $request)
    {
        $formName = $request->input('formName');
        $formUrl = $request->input('formUrl');
        $formId = $request->input('formId');
        $formContent = $request->input('formContent');

        if ($formName == 'register' || $formName == 'login' || $formName == 'Register' || $formName == 'Login') {
            $formView = view('formBuilder::formDesign.registerlogin', compact('formName', 'formUrl', 'formId', 'formContent'));
        } else {
            $formView = view('formBuilder::formDesign.formDesign', compact('formName', 'formUrl', 'formId', 'formContent'));
        }

        return response()->json(['view' => $formView->render()]);
    }

}
