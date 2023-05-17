<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct() {
        
    }

    public function index()
    {
        return view("index");
    }

    public function indexMahasiswa()
    {
        return view("allMahasiswa");
    }

    public function indexDosen()
    {
        return view("allDosen");
    }

    public function indexJadwal()
    {
        return view("allJadwal");
    }
}
