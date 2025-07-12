@extends('backend.layout.main')

@section('content')

@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif



      <!-- Counts Section -->
      <section class="dashboard-counts">
        <div class="container-fluid">
          <div class="row">
                        <div class="col-md-12 form-group">
              <div class="row">
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title">
                    <div class="icon"><i class="dripicons-graph-bar" style="color: #733686"></i></div>
                    <div>
                        <div class="count-number revenue-data">0.00</div>
                        <div class="name"><strong style="color: #733686">Revenue</strong></div>
                    </div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title">
                    <div class="icon"><i class="dripicons-return" style="color: #ff8952"></i></div>
                    <div>
                        <div class="count-number return-data">0.00</div>
                        <div class="name"><strong style="color: #ff8952">Sale Return</strong></div>
                    </div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title">
                    <div class="icon"><i class="dripicons-media-loop" style="color: #00c689"></i></div>
                    <div>
                        <div class="count-number purchase_return-data">0.00</div>
                        <div class="name"><strong style="color: #00c689">Purchase Return</strong></div>
                    </div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title">
                    <div class="icon"><i class="dripicons-trophy" style="color: #297ff9"></i></div>
                    <div>
                        <div class="count-number profit-data">0.00</div>
                        <div class="name"><strong style="color: #297ff9">Profit</strong></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                                                <div class="col-md-7 mt-4">
              <div class="card line-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Cash Flow</h4>
                </div>
                <div class="card-body">
                  <canvas id="cashFlow" data-color = "#733686" data-color_rgba = "rgba(115, 54, 134, 0.8)" data-recieved = "[&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;]" data-sent = "[&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;]" data-month = "[&quot;January&quot;,&quot;February&quot;,&quot;March&quot;,&quot;April&quot;,&quot;May&quot;,&quot;June&quot;,&quot;July&quot;]" data-label1="Payment Received" data-label2="Payment Sent"></canvas>
                </div>
              </div>
            </div>
                                                <div class="col-md-5 mt-4">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>July 2025</h4>
                </div>
                <div class="pie-chart mb-2">
                    <canvas id="transactionChart" data-color = "#733686" data-color_rgba = "rgba(115, 54, 134, 0.8)" data-revenue=0 data-purchase=0 data-expense=0 data-label1="Purchase" data-label2="Revenue" data-label3="Expense" width="100" height="95"> </canvas>
                </div>
              </div>
            </div>
                      </div>
        </div>

        <div class="container-fluid">
          <div class="row">
                                    <div class="col-md-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Yearly Report</h4>
                </div>
                <div class="card-body">
                  <canvas id="saleChart" data-sale_chart_value = "[&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;]" data-purchase_chart_value = "[&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;,&quot;0.00&quot;]" data-label1="Purchased Amount" data-label2="Sold Amount"></canvas>
                </div>
              </div>
            </div>
                        <div class="col-md-7">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Recent Transaction</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Latest 5</div>
                  </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#sale-latest" role="tab" data-toggle="tab">Sale</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#purchase-latest" role="tab" data-toggle="tab">Purchase</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#quotation-latest" role="tab" data-toggle="tab">Quotation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#payment-latest" role="tab" data-toggle="tab">Payment</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="sale-latest">
                      <div class="table-responsive">
                        <table id="recent-sale" class="table">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Reference</th>
                              <th>Customer</th>
                              <th>Status</th>
                              <th>Grand Total</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="purchase-latest">
                      <div class="table-responsive">
                        <table id="recent-purchase" class="table">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Reference</th>
                              <th>Supplier</th>
                              <th>Status</th>
                              <th>Grand Total</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
                      <div class="table-responsive">
                        <table id="recent-quotation" class="table">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Reference</th>
                              <th>Customer</th>
                              <th>Status</th>
                              <th>Grand Total</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="payment-latest">
                      <div class="table-responsive">
                        <table id="recent-payment" class="table">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Reference</th>
                              <th>Amount</th>
                              <th>Paid By</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Best Seller July</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Top 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table id="monthly-best-selling-qty" class="table">
                      <thead>
                        <tr>
                          <th>Product Details</th>
                          <th>Qty</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Best Seller 2025(Qty)</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Top 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table id="yearly-best-selling-qty" class="table">
                      <thead>
                        <tr>
                          <th>Product Details</th>
                          <th>Qty</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Best Seller 2025(Price)</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Top 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table id="yearly-best-selling-price" class="table">
                      <thead>
                        <tr>
                          <th>Product Details</th>
                          <th>Grand Total</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
