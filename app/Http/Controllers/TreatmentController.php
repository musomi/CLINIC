<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Patient;
use App\Test;
use App\Mykey;
use Auth;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key_id)
    {
      $keys=Mykey::find($key_id);
      $treatment=Treatment::find($keys->treatment_id);
      return view('pages.diagnosis')->with('treatment',$treatment)->with('mykeys',$keys);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testpatient(Mykey $mykeys)
    {
      $treatment=Treatment::find($mykeys->treatment_id);
      $tests=Test::where('treatment_key',$mykeys->treatment_key)->where('submited',false)->get();
      return view('pages.test_patient')->with('treatment',$treatment)->with('tests',$tests)->with('mykeys',$mykeys);
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
    public function update(Request $request, $mykey_id)
    {

      $keys=Mykey::find($mykey_id);
      $treatment=Treatment::find($keys->treatment_id);
      $patient=Patient::find($treatment->patient_id);

     $patient->stage=1;
     $patient->save();

     $test=$request->input('test');
     $test2=$request->input('test2');

     if($test !=""){
       $test=new Test;

       $test->treatment_id=$keys->treatment_id;
       $test->treatment_key=$keys->treatment_key;
       $test->patient_id=$patient->patient_id;
       $test->test=$request->input('test');
       $test->test_result="type your results here";
       $test->disease="conclusion here";
       $test->doctor="";
       $test->save();
     }
     if($test2 !=""){
       $test=new Test;

       $test->treatment_id=$keys->treatment_id;
       $test->treatment_key=$keys->treatment_key;
       $test->patient_id=$patient->patient_id;
       $test->test=$request->input('test2');
       $test->test_result="type your results here";
       $test->disease="conclusion here";
       $test->doctor="";
       $test->save();
     }



       $treatment->diagnosis=$request->input('diagnosis');
       $treatment->doctor=Auth::user()->name;
       $treatment->save();
       return redirect('/home')->with('success','diagnoss saved');
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
