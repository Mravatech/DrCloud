<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;



class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $serviceAccount         = ServiceAccount::fromJsonFile(__DIR__.'/drcloudapp-firebase-adminsdk-tkkut-8ceb04edac.json');
        $firebase               = (new Factory)
                                    ->withServiceAccount($serviceAccount)
                                    ->withDatabaseUri('https://drcloudapp.firebaseio.com/')
                                    ->create();

        $database               = $firebase->getDatabase();

        $newPost                = $database
                                    ->getReference('request/')
                                    ->push([  'name'        => 'AVtar ALaoao',
                                              'username'    => 'avatech',
                                              'lat'         => '6.484570',
                                              'long'        => '3.575270'


                                    ]);
        echo '<pre>';
        print_r($newPost->getvalue());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
