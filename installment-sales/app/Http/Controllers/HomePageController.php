<?php

namespace App\Http\Controllers;

use App\Models\ProvidedService;
use App\Models\Service;
use App\Models\WorkField;

class HomePageController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $services_areas = WorkField::all();
        return view('home',['services'=>$services,'services_areas'=>$services_areas]);
    }
}
