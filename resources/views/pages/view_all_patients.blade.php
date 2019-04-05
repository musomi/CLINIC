@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content  animated fadeInRight">
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
                                        <tbody>

                                          <th>Name</th>
                                          <th>Register User</th>
                                          <th>Id</th>
                                          <th></th>
                                          <th>Phone</th>
                                          <th>Next</th>
                                          <th>Status</th>
                                          <th></th>
                                          <td></td>
                                          @foreach($patients as $patient)
                                          <tr>
                                            <td><a href="/UserProfile/{{$patient->user_id}}" class="client-link">{{$patient->name}}</a></td>
                                            <td>{{$patient->register_user}}</td>
                                            <td>{{$patient->id_number}}</td>
                                            <td class="contact-type"><i class="fa fa-phone"></i></td>
                                            <td> {{$patient->phone}}</i></td>
                                            <td> {{$patient->next_kin_contact}}</i></td>
                                            <td><p><span class="label label-warning">
                                             @if($patient->stage==0)
                                               Waiting
                                             @elseif($patient->stage==1)
                                               Diagnosed
                                               @elseif($patient->stage==2)
                                                 Tested
                                                 @else
                                                 Treated
                                             @endif

                                            </span></p>
                                          </td>
                                          <td>
                                            @if($patient->stage==0 && App\Category_permission::has_perm(array(2)))
                                            <a class="btn btn-primary" href="/diagnos/{{$patient->key_id}}/patient">Diagnos</a>
                                            @elseif($patient->stage==1 && App\Category_permission::has_perm(array(6)))
                                            <a class="btn btn-primary" href="/test/{{$patient->key_id}}/patient">Test</a>
                                            @elseif($patient->stage==2 && App\Category_permission::has_perm(array(2)))
                                            <a class="btn btn-primary" href="/medication/{{$patient->key_id}}/patient">Medication</a>
                                            @elseif($patient->stage==3 && App\Category_permission::has_perm(array(4)))
                                            <a class="btn btn-primary" href="/medicate/{{$patient->patient_id}}/patient">Pharmacy</a>
                                            @endif

                                          </td>
                                            <td>
                                              @if($patient->stage==4 && App\Category_permission::has_perm(array(5)))
                                              <a class="btn btn-primary" href="/Patient/{{$patient->patient_id}}/Invoice">Invoice</a>
                                              <div class="btn-group">
                                                  <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle">Action </button>
                                                  <ul class="dropdown-menu">
                                                      <li><a class="dropdown-item" href="/Patient/{{$patient->patient_id}}/clear">Clear Patient</a></li>
                                                      <li><a class="dropdown-item" href="/Patient/{{$patient->patient_id}}/restore">New Medication</a></li>
                                                  </ul>
                                              </div>

                                              @endif
                                            </td>

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

                                          <th>Name</th>
                                          <th>Register User</th>
                                          <th>Id</th>
                                          <th></th>
                                          <th>Phone</th>
                                          <th>Next</th>
                                          <th>Status</th>
                                          <th></th>
                                          <td></td>
                                          @foreach($patients as $patient)
                                          <tr>
                                            <td><a href="/UserProfile/{{$patient->user_id}}" class="client-link">{{$patient->name}}</a></td>
                                            <td>{{$patient->register_user}}</td>
                                            <td>{{$patient->id_number}}</td>
                                            <td class="contact-type"><i class="fa fa-phone"></i></td>
                                            <td> {{$patient->phone}}</i></td>
                                            <td> {{$patient->next_kin_contact}}</i></td>
                                            <td><p><span class="label label-warning">
                                             @if($patient->stage==0)
                                               Waiting
                                             @elseif($patient->stage==1)
                                               Tested
                                               @elseif($patient->stage==2)
                                                 Treated
                                             @endif

                                            </span></p>
                                          </td>
                                          <td><a class="btn btn-primary" href="/">Diagnos</a></td>
                                            <td>
                                              @if($patient->stage==3)
                                              <a class="btn btn-primary" href="/Patient/{{$patient->patient_id}}/clear">clear</a>
                                              @endif
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
