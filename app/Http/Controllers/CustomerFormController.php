<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;

class CustomerFormController extends Controller
{
    public function index(Request $request)
{
    $limit = $request->get('limit', 5); // Default 10
    $forms = Form::paginate($limit);
    
    return view('auth.customer.qms.form', compact('forms'));
}

}
