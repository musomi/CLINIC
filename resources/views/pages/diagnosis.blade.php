@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
          <form method="POST" action="/diagnos/{{$mykeys->mykey_id}}/patient">
            {{csrf_field()}}

          <div class="modal-body">

            <div class="row">
              <div class="col-sm-12">

                <div class="form-group{{ $errors->has('diagnosis') ? ' has-error' : '' }} shadow-textarea">
                  <label for="diagnosis" class="col-md-12 control-label">Diagnosis</label>
                    <textarea class="form-control" id="diagnosis" style="text-align:left" rows="3" name="diagnosis">
                    {{$treatment->diagnosis}}
                    </textarea>
                        @if ($errors->has('diagnosis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('diagnosis') }}</strong>
                            </span>
                        @endif
                </div>

             </div>
           </div>
           <div class="row">
             <div class="col-sm-6">

               <div class="form-group{{ $errors->has('test') ? ' has-error' : '' }} shadow-textarea">
                 <label for="test" class="col-md-12 control-label">Suggested Test1</label>
                   <textarea class="form-control" id="test" style="text-align:left" rows="3" name="test">
                   </textarea>
                       @if ($errors->has('test'))
                           <span class="help-block">
                               <strong>{{ $errors->first('test') }}</strong>
                           </span>
                       @endif
               </div>

            </div>
            <div class="col-sm-6">

              <div class="form-group{{ $errors->has('test2') ? ' has-error' : '' }} shadow-textarea">
                <label for="test2" class="col-md-12 control-label">Suggested Test2</label>
                  <textarea class="form-control" id="test2" style="text-align:left" rows="3" name="test2">
                  </textarea>
                      @if ($errors->has('test2'))
                          <span class="help-block">
                              <strong>{{ $errors->first('test2') }}</strong>
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
