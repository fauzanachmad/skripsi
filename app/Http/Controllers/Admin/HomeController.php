<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;

class HomeController
{
    public function index()
    {
        $logger = $this->logger();

        return view('home', compact('logger'));
    }

    public function logger() {
        $clasification = Http::get('http://localhost:5000/report/clasification');
        $conf_matrix = Http::get('http://localhost:5000/report/confusion-matrix');

        return [json_decode($clasification->json(), true), json_decode($conf_matrix->json(), true)];
    }
}
