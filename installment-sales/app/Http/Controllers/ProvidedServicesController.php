<?php

namespace App\Http\Controllers;

use App\Models\ProvidedService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvidedServicesController extends Controller
{
  public function delete(ProvidedService $providedService){
      $providedService->delete();
      return redirect()->back()->with('success','Provided Service Deleted Successfully');
  }
}
