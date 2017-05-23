<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index() {

        return view('news.index');

    }

    public function create() {


    }

    public function store(Request $request) {

        $rules = [
            'image' => 'mimes:jpeg,bmp,png',
            'heading' => 'required',
            'content' => 'required',
            'post_date' => 'required|date'
        ];

        $this->validate($request, $rules);

    }

    public function update() {

    }

    public function ajax() {


    }
}
