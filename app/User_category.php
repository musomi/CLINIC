<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_category extends Model
{

  protected $fillable = [
          'category_name', 'category_description', 'deleted',
      ];
    public $primaryKey='user_category_id';

    public static function category_has_perm($permission_id,$category_id){
    return count(Category_permission::where('category_id',$category_id)->where('permission_id',$permission_id)->get()) > 0;
    }

}
