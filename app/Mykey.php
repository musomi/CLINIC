<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mykey extends Model
{
  protected $fillable = [
          'treatment_id','test_id',
      ];
    public $primaryKey='mykey_id';
}
