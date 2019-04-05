@extends('layouts.chasis')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>User Categories</h5>
                        <div class="ibox-tools">
                          <div style="margin-top:-5%" class="text-center">
                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Edit Category
                            </button>
                                </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->deleted?'INACTIVE':'ACTIVE'}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>

                                  <div class="btn-group">
                                      <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                      <ul class="dropdown-menu">
                                        @if($category->deleted)
                                          <li><a class="dropdown-item" href="/EditCategory/{{$category->user_category_id}}/restore">Restore</a></li>
                                          <li><a class="dropdown-item" href="/EditCategory/{{$category->user_category_id}}/destroy">Remove</a></li>
                                        @else
                                           <li><a class="dropdown-item" href="/EditCategory/{{$category->user_category_id}}/trash">Trash</a></li>
                                        @endif
                                      </ul>
                                  </div>

                                </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            </div>


            <div class="row">
                <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>My Permissions</h5>

                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                               use App\Permission;
                              ?>

                              @foreach($myperms as $myperm)

                            <tr>
                                <td>{{Permission::find($myperm->permission_id)->permission_name}}</td>
                                <td>{{Permission::find($myperm->permission_id)->permission_description}}</td>
                                <td>{{Permission::find($myperm->permission_id)->created_at}}</td>
                                <td>

                                  <div class="btn-group">
                                      <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                      <ul class="dropdown-menu">
                                           <li><a class="dropdown-item" href="/EditCategory/{{$myperm->category_permission_id}}/destroyperm">Deny Permission</a></li>
                                      </ul>
                                  </div>

                                </td>
                            </tr>
                               @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            </div>

                                   <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Edit {{$category->category_name}}</h4>
                                                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                    </div>
                                                    <form method="POST" action="/EditCategory/{{$category->user_category_id}}/update">
                                                         {{csrf_field()}}
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label>Name</label> <input type="text" name="name" value="{{$category->category_name}}" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                  <label>Description</label> <input type="text" name="description" value="{{$category->category_description}}" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                 <label class="control-label">Add Permissions</label>
                                                                 @if(Auth::user()->category_id==11)

                                     <select name="permissions[]" id="field-5" class="chosen-select" multiple data-placeholder="Choose permissions to permissions...">
                                    <option disabled value="">Select Permissions</option>
                                    <?php foreach (App\Permission::all() as $permission) {
                                      if (!App\User_category::category_has_perm($permission['permission_id'], $category['user_category_id']))
                                          printf('<option value="%d" %s>%s</option>', $permission['permission_id'],
                                              0 ? "selected" : "", $permission['permission_name']);

                                    } ?>
                                </select>
                                @else

                                <select name="permissions[]" id="field-5" class="chosen-select" multiple data-placeholder="Choose permissions to permissions...">
                                <option disabled value="">Select Permissions</option>
                                <?php foreach (App\Permission::where('permission_id','!=',3)->get() as $permission) {
                                 if (!App\User_category::category_has_perm($permission['permission_id'], $category['user_category_id']))
                                     printf('<option value="%d" %s>%s</option>', $permission['permission_id'],
                                         0 ? "selected" : "", $permission['permission_name']);

                                } ?>
                                </select>

                                @endif

                                                                               </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

        </div>
@endsection
