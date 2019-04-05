@extends('layouts.chasis')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
          @foreach($medications as $medication)
          <form method="POST" action="/medicate/{{$medication->patient_id}}/patient">
            {{csrf_field()}}
            <input type="hidden" name="medication_id" value="{{$medication->medication_id}}" class="form-control" />
          <div class="modal-body">

        <div class="row">

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('drug') ? ' has-error' : '' }} shadow-textarea">
             <label for="drug1" class="col-md-12 control-label">Drug</label>
               <input type="text" name="drug" value="{{$medication->drug}}" class="form-control" />

                   @if ($errors->has('drug'))
                       <span class="help-block">
                           <strong>{{ $errors->first('drug') }}</strong>
                       </span>
                   @endif
           </div>

         </div>

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }} shadow-textarea">
             <label for="test" class="col-md-12 control-label">Quantity</label>
               <input type="text" name="quantity" value="{{$medication->quantity}}" class="form-control" />

                   @if ($errors->has('quantity'))
                       <span class="help-block">
                           <strong>{{ $errors->first('quantity') }}</strong>
                       </span>
                   @endif
           </div>

         </div>

         <div class="col-sm-4">
           <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} shadow-textarea">
             <label for="test" class="col-md-12 control-label">Price in Ksh</label>
               <input type="text" name="price" value="{{$medication->price}}" class="form-control" />

                   @if ($errors->has('price'))
                       <span class="help-block">
                           <strong>{{ $errors->first('price') }}</strong>
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
          @endforeach
            </div>
        </div>
    </div>


@endsection
