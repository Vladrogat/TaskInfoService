<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index() {
        return view('pages.home');
    }

    function list () {
        return view('pages.list');
    }

    function feedback () {
        return view('pages.feedback');
    }

    function create (ApplicationRequest $request) {
        $fields = $request->validated();
        
        Application::create($fields);
        return redirect('pages.feedback')->with('success', 'заявку создана');
    }
}
