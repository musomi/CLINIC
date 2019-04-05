@extends('layouts.chasis')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

              <div class="row">
                <div class="col-lg-9">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="m-b-md">
                                          @if(Auth::user()->user_id == $user->user_id)
                                          <button  type="button" class="btn btn-white btn-xs float-right" data-toggle="modal" data-target="#modalReg">
                                              Edit Profile
                                          </button>
                                          @endif
                                            <h2>{{$user->name}}</h2>
                                        </div>


                                    </div>
                                    @if(App\Category_permission::has_perm(array(3)) || App\Category_permission::has_perm(array(1)))
                                    <div class="col-lg-8">
                                        <div class="m-b-md">
                                          <button  type="button" class="btn btn-white btn-xs float-right" data-toggle="modal" data-target="#modalCategory">
                                              Change Category
                                          </button>

                                        </div>

                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right"><dt>Status:</dt> </div>
                                            <div class="col-sm-8 text-sm-left"><dd class="mb-1"><span class="label label-primary">{{$user->status?'INACTIVE':'ACTIVE'}}</span></dd></div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right"><dt>Registered by:</dt> </div>
                                            <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{App\User::find($user->register_admin)->name}}</dd> </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right"><dt>Patients Treated:</dt> </div>
                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">  162</dd></div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right"><dt>Emergencies:</dt> </div>
                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"><a href="project_detail.html#" class="text-navy"> Zender Company</a> </dd></div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right"> <dt>category:</dt></div>
                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">{{App\User_category::find($user->category_id)->category_name}}</dd></div>
                                        </dl>

                                    </div>
                                    <div class="col-lg-6" id="cluster_info">

                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Last Updated:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1">16.08.2014 12:15:57</dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Created:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> 10.07.2014 23:36:57</dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>Participants:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="project-people mb-1">
                                                    <a href="#"><img alt="image" class="rounded-circle" src="{{asset('img/a3.jpg')}}"></a>

                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <dl class="row mb-0">
                                            <div class="col-sm-2 text-sm-right">
                                                <dt>Progress:</dt>
                                            </div>
                                            <div class="col-sm-10 text-sm-left">
                                                <dd>
                                                    <div class="progress m-b-1">
                                                        <div style="width: 20%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                                    </div>
                                                    <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li><a class="nav-link active" href="project_detail.html#tab-1" data-toggle="tab">Users messages</a></li>
                                                <li><a class="nav-link" href="project_detail.html#tab-2" data-toggle="tab">Last activity</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="feed-activity-list">
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/a2.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                    <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/a3.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">2h ago</small>
                                                    <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">2 days ago at 8:30am</small>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right text-navy">5h ago</small>
                                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                    <div class="actions">
                                                        <a href="project_detail.html"  class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                        <a href="project_detail.html"  class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/a5.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">2h ago</small>
                                                    <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                    <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">23h ago</small>
                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="project_detail.html#" class="float-left">
                                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">46h ago</small>
                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab-2">

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Comments</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                </td>
                                                <td>
                                                   Create project in webapp
                                                </td>
                                                <td>
                                                   12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                <p class="small">
                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                </td>
                                                <td>
                                                    Various versions
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                </td>
                                                <td>
                                                    There are many variations
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                </td>
                                                <td>
                                                    Latin words
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        Latin words, combined with a handful of model sentence structures
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                </td>
                                                <td>
                                                    The generated Lorem
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                </td>
                                                <td>
                                                    The first line
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                </td>
                                                <td>
                                                    The standard chunk
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                </td>
                                                <td>
                                                    Lorem Ipsum is that
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                    </p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                </td>
                                                <td>
                                                    Contrary to popular
                                                </td>
                                                <td>
                                                    12.07.2014 10:10:1
                                                </td>
                                                <td>
                                                    14.07.2014 10:16:36
                                                </td>
                                                <td>
                                                    <p class="small">
                                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                                                    </p>
                                                </td>

                                            </tr>

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










                  <div class="col-lg-3">
                      <div class="wrapper wrapper-content project-manager">
                          <h4>About Me</h4>
                          <img style="width:35%;height:35%" src="{{asset('images/'.$user->image)}}" class="img-fluid">
                          <p class="small">
                              {{$user->about}}
                          </p>
                          <p class="small font-bold">
                              <span><i class="fa fa-circle text-warning"></i> High priority</span>
                          </p>
                          <h5>Project tag</h5>
                          <ul class="tag-list" style="padding: 0">
                              <li><a href="project_detail.html"><i class="fa fa-tag"></i> Zender</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-tag"></i> Passages</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-tag"></i> Variations</a></li>
                          </ul>
                          <h5>Project files</h5>
                          <ul class="list-unstyled project-files">
                              <li><a href="project_detail.html"><i class="fa fa-file"></i> Project_document.docx</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                              <li><a href="project_detail.html"><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                          </ul>
                          <div class="text-center m-t-md">
                              <a href="project_detail.html#" class="btn btn-xs btn-primary">Add files</a>
                              <a href="project_detail.html#" class="btn btn-xs btn-primary">Report contact</a>

                          </div>
                      </div>
                  </div>
              </div>

     <div class="modal inmodal" id="modalReg" tabindex="-1" role="dialog" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content animated flipInY">
                                             <div class="modal-header">
                                                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                 <h4 class="modal-title">Edit</h4>
                                                 <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                             </div>
                                             <form method="POST" action="/UserProfile/{{$user->user_id}}" enctype="multipart/form-data">
                                                  {{csrf_field()}}
                                             <div class="modal-body">

                                               <div class="row">
                                                <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                   <label for="name" class="col-md-12 control-label">Name</label>


                                                       <input id="name" type="text" class="form-control" value="{{$user->name}}" name="name" value="{{ old('name') }}" required autofocus>

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
                                                       <input id="email" type="email" class="form-control" value="{{$user->email}}" name="email" value="{{ old('email') }}" required>

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
                                                 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                   <label for="phone" class="col-md-12 control-label">Phone Number</label>
                                                     <input id="phone" type="text" class="form-control" value="{{$user->phone}}" name="phone" required>
                                                         @if ($errors->has('phone'))
                                                             <span class="help-block">
                                                                 <strong>{{ $errors->first('phone') }}</strong>
                                                             </span>
                                                         @endif

                                                 </div>
                                               </div>
                                               <div class="col-sm-6">
                                               <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                   <label for="select_file" class="col-md-12 control-label">Choose image</label>


                                                     <input type="file" name="select_file" class="form-control" />

                                                       @if ($errors->has('select_file'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('select_file') }}</strong>
                                                           </span>
                                                       @endif

                                               </div>
                                               </div>
                                               </div>
                                               <div class="row">
                                                 <div class="col-sm-12">

                                                   <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }} shadow-textarea">
                                                       <textarea class="form-control" id="about" style="text-align:left" rows="3" name="about">
                                                         {{$user->about}}
                                                       </textarea>
                                                           @if ($errors->has('about'))
                                                               <span class="help-block">
                                                                   <strong>{{ $errors->first('about') }}</strong>
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

                                 <div class="modal inmodal" id="modalCategory" tabindex="-1" role="dialog" aria-hidden="true">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content animated flipInY">
                                                                         <div class="modal-header">
                                                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                             <h4 class="modal-title">Edit</h4>
                                                                             <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                                         </div>
                                                                         <form method="POST" action="/UserProfile/ChangeCategory/{{$user->user_id}}" enctype="multipart/form-data">
                                                                              {{csrf_field()}}
                                                                         <div class="modal-body">
                                                                           <div class="row">
                                                                            <div class="col-sm-12">
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
 </div>

@endsection
