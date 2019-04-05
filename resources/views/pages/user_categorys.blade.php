@extends('layouts.chasis')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>User Categories</h5>
                        <div style="margin-right:25%;margin-top:-1%" class="ibox-tools">
                          <div  class="text-center">
                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalReg">
                                New User
                            </button>
                            </div>
                        </div>
                        <div class="ibox-tools">
                          <div style="margin-top:-5%" class="text-center">
                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                New Category
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
                              @foreach($categories as $category)
                            <tr>
                                <td><a href="EditCategory/{{$category->user_category_id}}">{{$category->category_name}}</a></td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->deleted?'INACTIVE':'ACTIVE'}}</td>
                                <td>{{$category->created_at}}</td>
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
                                                        <h4 class="modal-title">New User Category</h4>
                                                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                    </div>
                                                    <form method="POST" action="/UserCategory/store">
                                                         {{csrf_field()}}
                                                    <div class="modal-body">
                                                                <div class="form-group">
                                                                  <label>Name</label> <input type="text" name="name" placeholder="Name of Category" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                  <label>Description</label> <input type="text" name="description" placeholder="Brief Description" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                 <label class="control-label">Add Permissions</label>

                                                                                             <select name="permissions[]" class="chosen-select" multiple style="width:350px;" tabindex="4" data-placeholder="Choose permissions">
                                                                                             <option disabled value="">Select Permissions</option>
                                                                                             <?php foreach ($permissions as $permission) {
                                                                                             printf('<option value="%d" %s>%s</option>', $permission['permission_id'],
                                                                                             0 ? "selected" : "", $permission['permission_name']);
                                                                                             } ?>
                                                                                             </select>

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


                                        <div class="modal inmodal" id="modalReg" tabindex="-1" role="dialog" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                 <div class="modal-content animated bounceInRight">
                                                         <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                             <h4 class="modal-title">Add User</h4>
                                                             <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                         </div>
                                                         <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                                              {{csrf_field()}}
                                                         <div class="modal-body">
                                                           <div class="row">
                                                            <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                               <label for="name" class="col-md-12 control-label">Name</label>


                                                                   <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                                   @if ($errors->has('name'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('name') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
                                                         <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                               <label for="email" class="col-md-12 control-label">E-Mail</label>
                                                                   <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                                   @if ($errors->has('email'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('email') }}</strong>
                                                                       </span>
                                                                   @endif
                                                           </div>
                                                         </div>

                                                        </div>
                                                        <div class="row">
                                                         <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                               <label for="category" class="col-md-12 control-label">Choose Category</label>


                                                                 <select class="form-control m-b" name="category">
                                                                      @foreach($categoriess as $category)
                                                                      <option value="{{$category->user_category_id}}">{{$category->category_name}}</option>
                                                                      @endforeach
                                                                  </select>

                                                                   @if ($errors->has('category'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('category') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
                                                          <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                               <label for="select_file" class="col-md-12 control-label">Choose image</label>


                                                                 <input type="file" name="select_file" class="form-control" required />

                                                                   @if ($errors->has('select_file'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('select_file') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
                                                          </div>
                                                          <div class="row">
                                                           <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                               <label for="password" class="col-md-12 control-label">Password</label>


                                                                   <input id="password" type="password" class="form-control" name="password" required>

                                                                   @if ($errors->has('password'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('password') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
                                                         <div class="col-sm-6">
                                                           <div class="form-group">
                                                               <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>
                                                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                           </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                         <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                             <label for="region" class="col-md-12 control-label">Phone Number</label>
                                                               <input id="phone" type="text" class="form-control" placeholder="Enter your phone number" name="phone" required>
                                                                   @if ($errors->has('phone'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('phone') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
                                                         <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                                               <label for="region" class="col-md-12 control-label">Select Region</label>


                                                                 <select class="form-control m-b" name="region">

                                                                      <option value="Nairobi">Nairobi</option>
                                                                      <option value="Tharaka Nithi">Tharaka Nithi</option>
                                                                      <option value="Kiambu">Kiambu</option>

                                                                  </select>

                                                                   @if ($errors->has('region'))
                                                                       <span class="help-block">
                                                                           <strong>{{ $errors->first('region') }}</strong>
                                                                       </span>
                                                                   @endif

                                                           </div>
                                                         </div>
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
