@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">

          <form method="POST" action="/NewPatient" enctype="multipart/form-data">
               {{csrf_field()}}


            <div class="row">
             <div class="col-sm-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-12 control-label">Name</label>


                    <input id="name" type="text" class="form-control" value="" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-12 control-label">Phone</label>
                    <input id="email" type="text" class="form-control" value="" name="phone" value="{{ old('phone') }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
            </div>
            </div>

            </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label for="id" class="col-md-12 control-label">Id Number</label>
                  <input id="id" type="text" class="form-control" value="" name="id" required>
                      @if ($errors->has('id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('id') }}</strong>
                          </span>
                      @endif

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group{{ $errors->has('kin') ? ' has-error' : '' }}">
                <label for="kin" class="col-md-12 control-label">Next of Kin Contact</label>
                  <input id="kin" type="text" class="form-control" value="" name="kin" required>
                      @if ($errors->has('kin'))
                          <span class="help-block">
                              <strong>{{ $errors->first('kin') }}</strong>
                          </span>
                      @endif

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
