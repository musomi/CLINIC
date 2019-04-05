<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Category_permission extends Model
{

  public $primaryKey='category_permission_id';

      protected $fillable = [
            'category_id', 'permission_id', 'deleted',
        ];


        public static function has_perm($required_permissions, $category_id = false)
            {
                $has_perm = true;
                foreach ($required_permissions as $required_permission) {
                    if ($has_perm && count(Category_permission::where(
                            array(
                                "permission_id" => $required_permission,
                                "deleted" => false,
                                "category_id" => ($category_id ? $category_id : Auth::user()->category_id)
                            ))->get()) == 0
                    ) {
                        $has_perm = false;
                    }
                }
                return $has_perm;
            }

}
