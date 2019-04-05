<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $fillable = [
          'name', 'phone', 'id_number','next_kin_contact','region','status','stage','deleted','register_admin','register_user',
      ];
    public $primaryKey='patient_id';
}
