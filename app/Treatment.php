<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
  protected $fillable = [
          'patient_id','register_admin', 'diagnosis','test','doctor',
      ];
    public $primaryKey='treatment_id';
}
