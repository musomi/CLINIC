<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Treatment;
use App\Mykey;
use App\Test;
use App\Medication;
use Auth;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients=Patient::all();
        return view('pages.viw_all_patients')->with('patients',$patients);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice(Patient $patient)
    {
      $mykeys=Mykey::find($patient->key_id);
      $medication_total=0;
      $tests_total=0;
      $medications=Medication::where('treatment_id',$mykeys->treatment_id)->get();
      $tests=Test::where('treatment_id',$mykeys->treatment_id)->get();
      $treatment=Treatment::find($mykeys->treatment_id);

      foreach($medications as $medication){
        $medication_total=$medication_total+$medication->amount;
      }

      foreach($tests as $test){
        $tests_total=$tests_total+$test->price;
      }

      $TOTAL=$medication_total+$tests_total+$treatment->consultation_fee;

      return view('pages.invoice')->with('patient',$patient)->with('medications',$medications)->with('tests',$tests)->with('TOTAL',$TOTAL)->with('printing',true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printinvoice(Patient $patient)
    {
      $mykeys=Mykey::find($patient->key_id);
      $medication_total=0;
      $tests_total=0;
      $medications=Medication::where('treatment_id',$mykeys->treatment_id)->get();
      $tests=Test::where('treatment_id',$mykeys->treatment_id)->get();
      $treatment=Treatment::find($mykeys->treatment_id);

      foreach($medications as $medication){
        $medication_total=$medication_total+$medication->amount;
      }

      foreach($tests as $test){
        $tests_total=$tests_total+$test->price;
      }

      $TOTAL=$medication_total+$tests_total+$treatment->consultation_fee;

      return view('pages.print_invoice')->with('patient',$patient)->with('medications',$medications)->with('tests',$tests)->with('TOTAL',$TOTAL)->with('printing',true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Patient $patient)
    {
        $treatments=Treatment::where('patient_id',$patient->patient_id)->orderBy('created_at','desc')->paginate(20);
        return view('pages.patient_profile')->with('patient',$patient)->with('treatments',$treatments);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function treatmentprofile(Treatment $treatment)
    {
        $patient=Patient::find($treatment->patient_id);
        $tests=Test::where('treatment_id',$treatment->treatment_id)->get();
        $medications=Medication::where('treatment_id',$treatment->treatment_id)->get();
        $treatments=Treatment::where('patient_id',$patient->patient_id)->get();

        return view('pages.patient_treatment_profile')->with('patient',$patient)->with('treatments',$treatments)->with('tests',$tests)->with('medications',$medications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.new_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $patient=new Patient;

        $patient->name=$request->input('name');
        $patient->phone=$request->input('phone');
        $patient->id_number=$request->input('id');
        $patient->next_kin_contact=$request->input('kin');
        $patient->register_admin=false;
        $patient->register_user=false;
        $patient->region=false;
        $patient->key_id=false;
        $patient->stage=false;
        $patient->status=false;
        $patient->deleted=false;

        $patient->save();


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patients=Patient::all();
      return view('pages.patients_database')->with('patients',$patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
      $patients=Patient::all();
      return view('pages.patients_database')->with('patients',$patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
      $patients=Patient::where('name',$request->input('jina'))->orwhere('id_number',$request->input('jina'))->orwhere('phone',$request->input('jina'))->get();
      return view('pages.patients_database')->with('patients',$patients);
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
    public function clear($id)
    {
      $patient=Patient::find($id);
      $patient->status=false;
      $patient->register_admin=false;
      $patient->register_user=false;
      $patient->stage=false;
      $patient->region=false;
      $patient->key_id=false;
      $patient->save();
      return redirect('/home');
    }

    public function restore($id)
    {
      $patient=Patient::find($id);
      $myrandom=rand();
      $treatment=new Treatment;
      $treatment->treatment_key=$myrandom;
      $treatment->patient_id=$patient->patient_id;
      $treatment->register_admin=Auth::user()->register_admin;
      $treatment->diagnosis="diagnos the patient here";
      $treatment->doctor="";
       $treatment->save();
       $treatment_id=$treatment->treatment_id;

       $mykeys=new Mykey;
       $mykeys->treatment_id=$treatment_id;
       $mykeys->treatment_key=$myrandom;
       $mykeys->patient_id=$patient->patient_id;
       $mykeys->save();
       $mykeyIds=$mykeys->mykey_id;


      $patient->status=true;
      $patient->stage=false;
      $patient->register_admin=Auth::user()->register_admin;
      $patient->register_user=Auth::user()->name;
      $patient->region=Auth::user()->region;
      $patient->key_id=$mykeyIds;
      $patient->save();
      return redirect('/home')->with('success','patient restored');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient=Patient::find($id);
      $patient->status=true;
      $patient->save();
      return redirect('/home');
    }
}
