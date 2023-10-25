<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>SmartWay Admin </title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="admin/assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="admin/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="admin/dist/css/style.min.css" rel="stylesheet" />
   
  </head>

  <body>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-body printableArea">
          
          <h3><b>INVOICE</b> <span class="pull-right">#5669626</span></h3>
          <hr />
          <div class="row">
            <div class="col-md-12">
              <div class="pull-left">
                <address>
                  <h3>
                    &nbsp;<b class="text-danger">Material Pro Admin</b>
                  </h3>
                  <p class="text-muted ms-1">
                    E 104, Dharti-2, <br />
                    Nr' Viswakarma Temple, <br />
                    Talaja Road, <br />
                    Bhavnagar - 364002
                  </p>
                </address>
              </div>
              <div class="pull-right text-end">
                <address>
                  <h3>To,</h3>
                  <h4 class="font-bold">Gaala & Sons,</h4>
                  <p class="text-muted ms-4">
                    E 104, Dharti-2, <br />
                    Nr' Viswakarma Temple, <br />
                    Talaja Road, <br />
                    Bhavnagar - 364002
                  </p>
                  <p class="mt-4">
                    <b>Invoice Date :</b>
                    <i class="mdi mdi-calendar"></i> 23rd Jan 2018
                  </p>
                  <p>
                    <b>Due Date :</b>
                    <i class="mdi mdi-calendar"></i> 25th Jan 2018
                  </p>
                </address>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive mt-5" style="clear: both">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Description</th>
                      <th class="text-end">Quantity</th>
                      <th class="text-end">Unit Cost</th>
                      <th class="text-end">Total</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($order as $order)
                    <tr>
                   
                      <td>{{($order->Product_name)}}</td>
                      
                    </tr>
                   
                    @endforeach
                  
                  </tbody>
                 
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-right mt-4 text-end">
                <p>Sub - Total amount: $13,848</p>
                <p>vat (10%) : $138</p>
                <hr />
                <h3><b>Total :</b> $13,986</h3>
              </div>
              <div class="clearfix"></div>
              <hr />
              <div class="text-end">
                <button class="btn btn-danger text-white" type="submit">
                  Proceed to payment
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  
     
      @include('admin.script')
      
    </div>
   
    
  </body>
</html>
