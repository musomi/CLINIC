@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @foreach($tests as $test)
          <form method="POST" action="/test/{{$test->test_id}}/patient">
            {{csrf_field()}}
            <input type="hidden" name="patient_id" value="{{$treatment->patient_id}}" class="form-control" />
          <div class="modal-body">

           <div class="row">
             <div class="col-sm-3">
               <div class="form-group{{ $errors->has('diagnosis') ? ' has-error' : '' }} shadow-textarea">
                 <label for="test" class="col-md-12 control-label">Suggested Test</label>
                   <textarea class="form-control" id="diagnosis" style="text-align:left" rows="3" name="test">
                    {{$test->test}}
                   </textarea>
                       @if ($errors->has('test'))
                           <span class="help-block">
                               <strong>{{ $errors->first('test') }}</strong>
                           </span>
                       @endif
               </div>

            </div>
            <div class="col-sm-4">
              <div class="form-group{{ $errors->has('result') ? ' has-error' : '' }} shadow-textarea">
                <label for="result" class="col-md-12 control-label">Result</label>

                  <textarea class="form-control" style="text-align:left" rows="3" name="result">

                  </textarea>
                      @if ($errors->has('result'))
                          <span class="help-block">
                              <strong>{{ $errors->first('result') }}</strong>
                          </span>
                      @endif
              </div>

           </div>

           <div class="col-sm-3">
             <div class="form-group{{ $errors->has('disease') ? ' has-error' : '' }} shadow-textarea">
               <label for="result" class="col-md-12 control-label">Disease</label>
                 <textarea class="form-control" style="text-align:left" rows="3" name="disease">

                 </textarea>
                     @if ($errors->has('disease'))
                         <span class="help-block">
                             <strong>{{ $errors->first('disease') }}</strong>
                         </span>
                     @endif
             </div>

          </div>

          <div class="col-sm-2">
            <div class="form-group{{ $errors->has('testprice') ? ' has-error' : '' }} shadow-textarea">
              <label for="testprice" class="col-md-12 control-label">Test Price</label>
                <textarea class="form-control" style="text-align:left" rows="3" name="testprice">

                </textarea>
                    @if ($errors->has('testprice'))
                        <span class="help-block">
                            <strong>{{ $errors->first('testprice') }}</strong>
                        </span>
                    @endif
            </div>

         </div>

          </div>


          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Submit</button>

          </div>
          </form>
          @endforeach
            </div>
        </div>
    </div>


@endsection
