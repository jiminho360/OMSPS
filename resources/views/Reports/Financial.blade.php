@extends('layouts.app');

@section('title','Financial Report');

@section('content')
    <!-- page content -->
    <div class="" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Financial Report</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-file-pdf-o"></i> Financial Report </h2>
                            <h2 class="pull-right">Date: {{date("d/m/Y")}} </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <section class="content invoice">
                                <!-- title row -->
                                <div class="row">
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Click Pre&Primary School.</strong>
                                            <br>Kitunda, Dar-es-Salaam
                                            <br>Phone: 1 (804) 123-9876
                                            <br>Email: ClickPre&primarySchool@gmail.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>School Director</strong>
                                            <br>Ubungo, Dar-es-Salaam
                                            <br>Phone: 1 (804) 123-9876
                                            <br>Email: jon@gmail.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Financial Report No:007612</b>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <!---Non-current Assets---->
                                    <div class="col-xs-12 table">
                                        <h2>Assets:</h2>
                                        <h3>Non-current Assets:</h3>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 59%">Description</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!---End of Non-current Assets---->
                                    <!---Current Assets---->
                                    <div class="col-xs-12 table">
                                        <h3>Current Assets:</h3>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 59%">Description</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!---End of Current Assets---->
                                    <h2>Liabilities:</h2>
                                    <!---Current Liabilities---->
                                    <div class="col-xs-12 table">
                                        <h3>Current Liabilities:</h3>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 59%">Description</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!---End of Current Liabilities---->
                                    <!---Non-Current Liabilities---->
                                    <div class="col-xs-12 table">
                                        <h3>Non-current Liabilities:</h3>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 59%">Description</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>$00.0</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!---End of Non-Current Liabilities---->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="images/visa.png" alt="Visa">
                                        <img src="images/mastercard.png" alt="Mastercard">
                                        <img src="images/american-express.png" alt="American Express">
                                        <img src="images/paypal.png" alt="Paypal">
                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                        <p class="lead">Amount Due 2/22/2014</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>$250.30</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (9.3%)</th>
                                                    <td>$10.34</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping:</th>
                                                    <td>$5.80</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>$265.24</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                        <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                        <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{url('pdf')}}"><i class="fa fa-download"></i> Generate PDF</a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection