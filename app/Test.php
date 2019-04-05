<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  protected $fillable = [
          'patient_id','treatment_id', 'test_result','disease','doctor','price',
      ];
    public $primaryKey='test_id';
}
