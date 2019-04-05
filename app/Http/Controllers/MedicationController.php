<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Test;
use App\Mykey;
use App\Medication;
use App\Patient;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mykey $mykeys)
    {
      $treatment=Treatment::find($mykeys->treatment_id);
      $tests=Test::where('treatment_key',$mykeys->treatment_key)->get();
      return view('pages.medication')->with('treatment',$treatment)->with('tests',$tests)->with('mykeys',$mykeys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Mykey $mykeys)
    {

        $patient=Patient::find($mykeys->patient_id);
        $patient->stage=3;
        $patient->save();

        $drug1=$request->input('drug1');
        $drug2=$request->input('drug2');

           if($drug1 !=""){
            $medication=new Medication;
             $medication->patient_id=$mykeys->patient_id;
             $medication->treatment_id=$mykeys->treatment_id;
             $medication->treatment_key=$mykeys->treatment_key;
             $medication->drug=$drug1;
             $medication->quantity=$request->input('quantity1');
             $medication->price=$request->input('price1');
             $medication->amount=$request->input('quantity1')*$request->input('price1');
             $medication->save();

           }
           if($drug2 !=""){
            $medication=new Medication;
             $medication->patient_id=$mykeys->patient_id;
             $medication->treatment_id=$mykeys->treatment_id;
             $medication->treatment_key=$mykeys->treatment_key;
             $medication->drug=$drug2;
             $medication->quantity=$request->input('quantity2');
             $medication->price=$request->input('price2');
             $medication->amount=$request->input('quantity2')*$request->input('price2');
             $medication->save();

           }



        return redirect('/home')->with('success','medications saved');

      //  echo $mykeys->patient_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
      $mykeys=Mykey::find($patient->key_id);
      $medications=Medication::where('treatment_key',$mykeys->treatment_key)->where('submited',false)->get();
      return view('pages.medicate')->with('medications',$medications);
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
    public function update(Request $request,Patient $patient)
    {


          $medication=Medication::find($request->input('medication_id'));

           $medication->drug=$request->input('drug');
           $medication->quantity=$request->input('quantity');
           $medication->price=$request->input('price');
           $medication->amount=$request->input('quantity')*$request->input('price');
           $medication->submited=true;
           $medication->save();

           if(count(Medication::where('treatment_key',$medication->treatment_key)->where('submited',false)->get()) > 0){

            return redirect('/medicate/'.$patient->patient_id.'/patient')->with('success','patient received drug');

           }else{

             $patient->stage=4;
             $patient->save();
             return redirect('/home')->with('success','patient received drug');
           }


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
