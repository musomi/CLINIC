@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
          <form method="POST" action="/medication/{{$mykeys->mykey_id}}/patient">
            {{csrf_field()}}
            <input type="hidden" name="patient_id" value="{{$treatment->patient_id}}" class="form-control" />
          <div class="modal-body">
            @foreach($tests as $test)
            <div class="row">
              <div class="col-sm-4">
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
                    {{$test->test_result}}
                   </textarea>
                       @if ($errors->has('result'))
                           <span class="help-block">
                               <strong>{{ $errors->first('result') }}</strong>
                           </span>
                       @endif
               </div>

            </div>

            <div class="col-sm-4">
              <div class="form-group{{ $errors->has('disease') ? ' has-error' : '' }} shadow-textarea">
                <label for="result" class="col-md-12 control-label">Disease</label>
                  <textarea class="form-control" style="text-align:left" rows="3" name="disease">
                   {{$test->disease}}
                  </textarea>
                      @if ($errors->has('disease'))
                          <span class="help-block">
                              <strong>{{ $errors->first('disease') }}</strong>
                          </span>
                      @endif
              </div>

           </div>

           </div>
           @endforeach


        <div class="row">

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('drug1') ? ' has-error' : '' }} shadow-textarea">
             <label for="drug1" class="col-md-12 control-label">Drug 1</label>
               <input type="text" name="drug1" value="" class="form-control" />

                   @if ($errors->has('disease'))
                       <span class="help-block">
                           <strong>{{ $errors->first('drug1') }}</strong>
                       </span>
                   @endif
           </div>

         </div>

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('quantity1') ? ' has-error' : '' }} shadow-textarea">
             <label for="test" class="col-md-12 control-label">Quantity</label>
               <input type="text" name="quantity1" value="" class="form-control" />

                   @if ($errors->has('quantity1'))
                       <span class="help-block">
                           <strong>{{ $errors->first('quantity1') }}</strong>
                       </span>
                   @endif
           </div>

         </div>

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('price1') ? ' has-error' : '' }} shadow-textarea">
             <label for="test" class="col-md-12 control-label">Price in Ksh</label>
               <input type="text" name="price1" value="" class="form-control" />

                   @if ($errors->has('price1'))
                       <span class="help-block">
                           <strong>{{ $errors->first('price1') }}</strong>
                       </span>
                   @endif
           </div>

         </div>

       </div>
       <div class="row">

        <div class="col-sm-4">
          <div class="form-group{{ $errors->has('drug2') ? ' has-error' : '' }} shadow-textarea">
            <label for="drug2" class="col-md-12 control-label">Drug 2</label>
              <input type="text" name="drug2" value="" class="form-control" />

                  @if ($errors->has('drug2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('drug2') }}</strong>
                      </span>
                  @endif
          </div>

        </div>

        <div class="col-sm-4">
          <div class="form-group{{ $errors->has('quantity2') ? ' has-error' : '' }} shadow-textarea">
            <label for="test" class="col-md-12 control-label">Quantity</label>
              <input type="text" name="quantity2" value="" class="form-control" />

                  @if ($errors->has('quantity2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('quantity2') }}</strong>
                      </span>
                  @endif
          </div>

        </div>

        <div class="col-sm-4">
          <div class="form-group{{ $errors->has('price2') ? ' has-error' : '' }} shadow-textarea">
            <label for="test" class="col-md-12 control-label">Price in Ksh</label>
              <input type="text" name="price2" value="" class="form-control" />

                  @if ($errors->has('price2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('price2') }}</strong>
                      </span>
                  @endif
          </div>

        </div>

      </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>

          </div>
          </form>
            </div>
        </div>
    </div>


@endsection
