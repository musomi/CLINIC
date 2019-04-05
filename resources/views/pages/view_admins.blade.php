@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content  animated fadeInRight">
  <div class="row">
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <span class="label label-success float-right">Monthly</span>
                                  <h5>Admins</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">{{$number}}</h1>
                                  <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                  <small>Total income</small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <span class="label label-info float-right">Annual</span>
                                  <h5>Other Users</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">{{$other_users}}</h1>
                                  <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                  <small>New orders</small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <span class="label label-primary float-right">Today</span>
                                  <h5>Patients</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">{{$patients}}</h1>
                                  <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                  <small>New visits</small>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="ibox ">
                              <div class="ibox-title">
                                  <span class="label label-danger float-right">Low value</span>
                                  <h5>User activity</h5>
                              </div>
                              <div class="ibox-content">
                                  <h1 class="no-margins">80,600</h1>
                                  <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                  <small>In first month</small>
                              </div>
                          </div>
              </div>
          </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small float-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                    <h2>Clients</h2>
                    <p>
                        All clients need to be verified before you can send email and set a project.
                    </p>
                    <form id="addformm" method="post" action="ManageAdmins">
                         {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="jina" placeholder="Search client " class="input form-control">
                        <span class="input-group-append">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
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
                                      <th>Region</th>
                                      <th>Status</th>
                                      <th></th>
                                      <th></th>
                                        <tbody>
                                       @foreach($admins as $admin)
                                        <tr>
                                            <td class="client-avatar"><a href="clients.html"><img alt="image" src="{{asset('images/'.$admin->image)}}"></a> </td>
                                            <td><a href="/UserProfile/{{$admin->user_id}}" class="client-link">{{$admin->name}}</a></td>
                                            <td>{{App\User_category::find($admin->category_id)->category_name}}</td>
                                            <td class="contact-type"><i class="fa fa-phone"></i></td>
                                            <td> {{$admin->phone}}</i></td>
                                            <td class="contact-type"><i class="fa fa-envelope"></i></td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->region}}</td>
                                            <td>{{$admin->status?'ACTIVE':'INACTIVE'}}</td>
                                            <td>
                                              <div class="btn-group">
                                                  <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                              <ul class="dropdown-menu">
                                                @if($admin->status)
                                                  <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/trash">Trash</a></li>
                                                @else
                                                   <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/restore">Restore</a></li>
                                                   <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/destroy">Remove</a></li>
                                                @endif
                                              </ul>
                                            </div>

                                            </td>
                                            <td><a class="btn btn-primary" href="/View/{{$admin->user_id}}/Clients">View Clients</a></td>
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
                                          @foreach($admins as $admin)
                                           <tr>
                                               <td class="client-avatar"><a href="clients.html"><img alt="image" src="{{asset('images/'.$admin->image)}}"></a> </td>
                                               <td><a href="/UserProfile/{{$admin->user_id}}" class="client-link">{{$admin->name}}</a></td>
                                               <td>{{App\User_category::find($admin->category_id)->category_name}}</td>
                                               <td class="contact-type"><i class="fa fa-phone"></i></td>
                                               <td> {{$admin->phone}}</i></td>
                                               <td class="contact-type"><i class="fa fa-envelope"></i></td>
                                               <td>{{$admin->email}}</td>
                                               <td>{{$admin->region}}</td>
                                               <td>
                                                 <div class="btn-group">
                                                     <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                                 <ul class="dropdown-menu">
                                                   @if($admin->status)
                                                     <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/restore">Restore</a></li>
                                                     <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/destroy">Remove</a></li>
                                                   @else
                                                      <li><a class="dropdown-item" href="/ManageAdmins/{{$admin->user_id}}/trash">Trash</a></li>
                                                   @endif
                                                 </ul>
                                               </div>

                                               </td>
                                               <td><a class="btn btn-primary" href="/View/{{$admin->user_id}}/Clients">View Clients</a></td>
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

<script type="text/javascript">
$(function(){
$("#addform").on('submit',function(e){
   e.preventDefault();


  $.ajax({

type: "POST",

url: "/ManageAdmins",

data: $('#addform').serialize(),

success:function(response)
          {
console.log(response)
alert('data saved');
window.location.replace("/ManageAdmins");
},error:function(error){
  console.log(error)
  alert('data not saved');
}
      });
	  });
  });

</script>


@endsection
