@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>{{$user->region}} Users</h2>
                    <p>
                        All clients need to be verified before you can send email and set a project.
                    </p>
                    @if(Auth::user()->category_id !=11)
                    <div style="margin-right:%;margin-top:-1%" class="ibox-tools">
                      <div  class="text-center">
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalReg">
                            New User
                        </button>
                        </div>
                    </div>
                    @endif
                    <form id="addformm" method="post" action="/ManageAdmins">
                         {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="jina" placeholder="Search client " class="input form-control">
                        <span class="input-group-append">
                                <button type="text" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                        </span>
                    </div>
                  </form>
                    <div class="clients-list">
                    <span class="float-right small text-muted">1406 Elements</span>
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="clients.html#tab-1"><i class="fa fa-user"></i> Contacts</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="clients.html#tab-2"><i class="fa fa-briefcase"></i> Companies</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                      <th></th>
                                      <th>Name</th>
                                      <th>Category</th>
                                      <th></th>
                                      <th>Phone</th>
                                      <th></th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      @if(Auth::user()->category_id !=11)
                                      <th></th>
                                      @endif
                                        <tbody>
                                       @foreach($my_users as $user)
                                        <tr>
                                            <td class="client-avatar"><a href="clients.html"><img alt="image" src="{{asset('images/'.$user->image)}}"></a> </td>
                                            <td><a href="/UserProfile/{{$user->user_id}}" class="client-link">{{$user->name}}</a></td>
                                            <td>{{App\User_category::find($user->category_id)->category_name}}</td>
                                            <td class="contact-type"><i class="fa fa-phone"></i></td>
                                            <td> {{$user->phone}}</i></td>
                                            <td class="contact-type"><i class="fa fa-envelope"></i></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->status?'ACTIVE':'INACTIVE'}}</td>
                                          @if(Auth::user()->category_id !=11)
                                            <td>
                                              <div class="btn-group">
                                                  <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                              <ul class="dropdown-menu">
                                                @if($user->status)
                                                  <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/trash">Trash</a></li>
                                                @else
                                                <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/restore">Restore</a></li>
                                                <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/destroy">Remove</a></li>
                                                @endif
                                              </ul>
                                              </div>

                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                          <th></th>
                                          <th>Name</th>
                                          <th>Category</th>
                                          <th></th>
                                          <th>Phone</th>
                                          <th></th>
                                          <th>Email</th>
                                          <th>Region</th>
                                          <th>Status</th>
                                          <th></th>
                                          @foreach($my_users as $user)
                                           <tr>
                                               <td class="client-avatar"><a href="clients.html"><img alt="image" src="{{asset('images/'.$user->image)}}"></a> </td>
                                               <td><a href="/UserProfile/{{$user->user_id}}" class="client-link">{{$user->name}}</a></td>
                                               <td>{{App\User_category::find($user->category_id)->category_name}}</td>
                                               <td class="contact-type"><i class="fa fa-phone"></i></td>
                                               <td> {{$user->phone}}</i></td>
                                               <td class="contact-type"><i class="fa fa-envelope"></i></td>
                                               <td>{{$user->email}}</td>
                                               <td>{{$user->region}}</td>
                                               <td>{{$user->status?'ACTIVE':'INACTIVE'}}</td>
                                               <td>
                                                 <div class="btn-group">
                                                     <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                                 <ul class="dropdown-menu">
                                                   @if($user->status)
                                                     <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/trash">Trash</a></li>
                                                   @else
                                                   <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/restore">Restore</a></li>
                                                   <li><a class="dropdown-item" href="/ManageAdmins/{{$user->user_id}}/destroy">Remove</a></li>
                                                   @endif
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

                    </div>
                </div>
            </div>
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
                      <input id="region" type="hidden" class="form-control" name="region" value="{{Auth::user()->region}}">
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
                              @foreach($categories as $category)
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
                 <div class="col-sm-12">
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

@endsection
