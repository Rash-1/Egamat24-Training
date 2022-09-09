<?php

namespace App\Http\Controllers;

use App\Models\ProvidedService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvidedServicesController extends Controller
{
  public function delete(ProvidedService $providedService){
      $providedService->delete();
      return redirect()->back()->with('success','Provided Service Deleted Successfully');
  }
  public function show(Service $service){
     $provided_services =  ProvidedService::where('service_id',$service->id)->get();
     return view('provider/providedServices',['provided_services'=>$provided_services,'service'=>$service]);
  }
}
