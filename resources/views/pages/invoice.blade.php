@extends('layouts.chasis')
@section('content')
<div class="wrapper wrapper-content  animated fadeInRight">
<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                        <strong>Inspinia, Inc.</strong><br>
                                        106 Jorg Avenu, 600/10<br>
                                        Chicago, VT 32456<br>
                                        <abbr title="Phone">P:</abbr> (123) 601-4590
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">INV-000567F7-00</h4>
                                    <span>To:</span>
                                    <address>
                                        <strong>Corporate, Inc.</strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> (120) 9000-4321
                                    </address>
                                    <p>
                                        <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                                        <span><strong>Due Date:</strong> March 24, 2014</span>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Test Result</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Tax</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td><div><strong>Consultaion Fee</strong></div>
                                              <small>This fee is charged for diagnosis</small></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>300</td>
                                      </tr>
                                      @foreach($tests as $test)
                                    <tr>
                                        <td><div><strong>Tested for {{$test->test}}</strong></div>
                                            <small>{{$test->test_result}}</small></td>
                                        <td>{{$test->disease}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$test->price}}</td>
                                    </tr>
                                    @endforeach
                                      @foreach($medications as $medication)
                                    <tr>
                                        <td><div><strong>{{$medication->drug}}</strong></div>
                                            <small></small></td>
                                        <td></td>
                                        <td>{{$medication->quantity}}</td>
                                        <td>{{$medication->price}}</td>
                                        <td></td>
                                        <td>{{$medication->amount}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>Ksh.{{$TOTAL}}</td>
                                </tr>
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>Ksh. {{0.16*$TOTAL}}</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>Ksh.{{$TOTAL*1.16}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>

                            <div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div>
                        </div>




                </div>
            </div>
        </div>
      </div>

@endsection
