<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
  protected $fillable = [
          'patient_id', 'treatment_id','treatment_key', 'drug','quantity','price','amount','doctor',
      ];
    public $primaryKey='medication_id';
}
