<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceAccount             = ServiceAccount::fromJsonFile(__DIR__.'/drcloudapp-firebase-adminsdk-tkkut-8ceb04edac.json');
        $firebase                   = (new Factory)
                                        ->withServiceAccount($serviceAccount)
                                        ->withDatabaseUri('https://drcloudapp.firebaseio.com/')
                                        ->create();
        $database                   = $firebase->getDatabase();
        $doctor_payload             = $database->getReference('doctors/');
        $patient_payload            = $database->getReference('patients/');
        $hospital_payload           = $database->getReference('hospitals/');
        $request_payload            = $database->getReference('request/');


        $doctorsID                  = $doctor_payload->getChildKeys();
        $patientsID                 = $patient_payload->getChildKeys();
        $hospitalsID                = $hospital_payload->getChildKeys();
        $requestID                  = $request_payload->getChildKeys();

        for ($i=0; $i < count($doctorsID); $i++) { 
            $doctorDetails[]        = $database->getReference('doctors/'.$doctorsID[$i])->getValue();
        }

        for ($i=0; $i < count($patientsID); $i++) { 
            $patientDetails[]       = $database->getReference('patients/'.$patientsID[$i])->getValue();
        }

        for ($i=0; $i < count($hospitalsID); $i++) { 
            $hospitalDetails[]      = $database->getReference('hospitals/'.$hospitalsID[$i])->getValue();
        }

        for ($i=0; $i < count($requestID); $i++) { 
            $requestDetails[]       = $database->getReference('request/'.$requestID[$i])->getValue();
        }

        $data['doctors']            = $doctorDetails;
        $data['patients']           = $patientDetails;
        $data['hospitals']          = $hospitalDetails;
        $data['requests']            = $requestDetails;

        return view('home', $data);
    }
}
