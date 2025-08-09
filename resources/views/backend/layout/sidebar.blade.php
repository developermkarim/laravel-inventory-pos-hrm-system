<ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="{{ route('dashboard') }}"> <i class="dripicons-meter"></i><span>{{ trans('file.dashboard') }}</span></a></li>
                                    <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>{{ trans('file.product') }}</span><span></span></a>
            <ul id="product" class="collapse list-unstyled ">
                              <li id="category-menu">
    <a href="{{route('category.index')}}">{{ trans('file.category') }}</a>
</li>
<li id="product-list-menu">
    <a href="{{ url('') }}">{{ trans('file.product_list') }}</a>
</li>
<li id="product-create-menu">
    <a href="{{ url('') }}">{{ trans('file.add_product') }}</a>
</li>
<li id="printBarcode-menu">
    <a href="{{ url('') }}">{{ trans('file.print_barcode') }}</a>
</li>
<li id="adjustment-list-menu">
    <a href="{{ url('') }}">{{ trans('file.Adjustment List') }}</a>
</li>
<li id="adjustment-create-menu">
    <a href="{{ url('') }}">{{ trans('file.Add Adjustment') }}</a>
</li>
<li id="stock-count-menu">
    <a href="{{ url('') }}">{{ trans('file.Stock Count') }}</a>
</li>

                            </ul>
            </li>

            <li><a href="#purchase" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-card"></i><span>{{ trans('file.Purchase') }}</span></a>
    <ul id="purchase" class="collapse list-unstyled">
        <li id="purchase-list-menu"><a href="{{ url('') }}">{{ trans('file.Purchase List') }}</a></li>
        <li id="purchase-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Purchase') }}</a></li>
        <li id="purchase-import-menu"><a href="{{ url('') }}">{{ trans('file.Import Purchase By CSV') }}</a></li>
    </ul>
</li>

<li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-cart"></i><span>{{ trans('file.Sale') }}</span></a>
    <ul id="sale" class="collapse list-unstyled">
        <li id="sale-list-menu"><a href="{{ url('') }}">{{ trans('file.Sale List') }}</a></li>
        <li><a href="{{ url('') }}">POS</a></li>
        <li id="sale-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Sale') }}</a></li>
        <li id="sale-import-menu"><a href="{{ url('') }}">{{ trans('file.Import Sale By CSV') }}</a></li>
        <li id="gift-card-menu"><a href="{{ url('') }}">{{ trans('file.Gift Card List') }}</a></li>
        <li id="coupon-menu"><a href="{{ url('') }}">{{ trans('file.Coupon List') }}</a></li>
        <li id="courier-menu"><a href="{{ url('') }}">{{ trans('file.Courier List') }}</a></li>
        <li id="delivery-menu"><a href="{{ url('') }}">{{ trans('file.Delivery List') }}</a></li>
    </ul>
</li>

<li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span>{{ trans('file.Expense') }}</span></a>
    <ul id="expense" class="collapse list-unstyled">
        <li id="exp-cat-menu"><a href="{{ url('') }}">{{ trans('file.Expense Category') }}</a></li>
        <li id="exp-list-menu"><a href="{{ url('') }}">{{ trans('file.Expense List') }}</a></li>
        <li><a id="add-expense" href="{{ url('') }}">{{ trans('file.Add Expense') }}</a></li>
    </ul>
</li>

<li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document"></i><span>{{ trans('file.Quotation') }}</span></a>
    <ul id="quotation" class="collapse list-unstyled">
        <li id="quotation-list-menu"><a href="{{ url('') }}">{{ trans('file.Quotation List') }}</a></li>
        <li id="quotation-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Quotation') }}</a></li>
    </ul>
</li>

<li><a href="#transfer" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-export"></i><span>{{ trans('file.Transfer') }}</span></a>
    <ul id="transfer" class="collapse list-unstyled">
        <li id="transfer-list-menu"><a href="{{ url('') }}">{{ trans('file.Transfer List') }}</a></li>
        <li id="transfer-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Transfer') }}</a></li>
        <li id="transfer-import-menu"><a href="{{ url('') }}">{{ trans('file.Import Transfer By CSV') }}</a></li>
    </ul>
</li>

<li><a href="#return" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-return"></i><span>{{ trans('file.return') }}</span></a>
    <ul id="return" class="collapse list-unstyled">
        <li id="sale-return-menu"><a href="{{ url('') }}">{{ trans('file.Sale') }}</a></li>
        <li id="purchase-return-menu"><a href="{{ url('') }}">{{ trans('file.Purchase') }}</a></li>
    </ul>
</li>

<li><a href="#account" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-briefcase"></i><span>{{ trans('file.Accounting') }}</span></a>
    <ul id="account" class="collapse list-unstyled">
        <li id="account-list-menu"><a href="{{ url('') }}">{{ trans('file.Account List') }}</a></li>
        <li><a id="add-account" href="{{ url('') }}">{{ trans('file.Add Account') }}</a></li>
        <li id="money-transfer-menu"><a href="{{ url('') }}">{{ trans('file.Money Transfer') }}</a></li>
        <li id="balance-sheet-menu"><a href="{{ url('') }}">{{ trans('file.Balance Sheet') }}</a></li>
        <li id="account-statement-menu"><a id="account-statement" href="{{ url('') }}">{{ trans('file.Account Statement') }}</a></li>
    </ul>
</li>

<li><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user-group"></i><span>HRM</span></a>
    <ul id="hrm" class="collapse list-unstyled">
        <li id="dept-menu"><a href="{{ url('') }}">{{ trans('file.Department') }}</a></li>
        <li id="employee-menu"><a href="{{ url('') }}">{{ trans('file.Employee') }}</a></li>
        <li id="attendance-menu"><a href="{{ url('') }}">{{ trans('file.Attendance') }}</a></li>
        <li id="payroll-menu"><a href="{{ url('') }}">{{ trans('file.Payroll') }}</a></li>
        <li id="holiday-menu"><a href="{{ url('') }}">{{ trans('file.Holiday') }}</a></li>
    </ul>
</li>

<li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user"></i><span>{{ trans('file.People') }}</span></a>
    <ul id="people" class="collapse list-unstyled">
        <li id="user-list-menu"><a href="{{ url('') }}">{{ trans('file.User List') }}</a></li>
        <li id="user-create-menu"><a href="{{ url('') }}">{{ trans('file.Add User') }}</a></li>

        <li id="customer-list-menu"><a href="{{ url('') }}">{{ trans('file.Customer List') }}</a></li>
        <li id="customer-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Customer') }}</a></li>

        <li id="biller-list-menu"><a href="{{ url('') }}">{{ trans('file.Biller List') }}</a></li>
        <li id="biller-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Biller') }}</a></li>

        <li id="supplier-list-menu"><a href="{{ url('') }}">{{ trans('file.Supplier List') }}</a></li>
        <li id="supplier-create-menu"><a href="{{ url('') }}">{{ trans('file.Add Supplier') }}</a></li>
    </ul>
</li>


        <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span>{{ trans('file.Reports') }}</span></a>

            <ul id="report" class="collapse list-unstyled ">

                <li id="profit-loss-report-menu">
                    <a href="" id="profitLoss-link">{{ trans('file.Summary Report') }}</a>
                </li>

 <li id="best-seller-report-menu">
        <a href="{{  url('') }}">{{ trans('file.Best Seller') }}</a>
    </li>

         <li id="product-report-menu">
                    <a href="" id="profitLoss-link">{{ trans('file.Product Report') }}</a>
             </li>

    <li id="daily-sale-report-menu">
        <a href="{{  url('') }}">{{ trans('file.Daily Sale') }}</a>
    </li>



    <li id="monthly-sale-report-menu">
        <a href="{{  url('') }}">{{ trans('file.Monthly Sale') }}</a>
    </li>



    <li id="daily-purchase-report-menu">
        <a href="{{  url('') }}">{{ trans('file.Daily Purchase') }}</a>
    </li>



    <li id="monthly-purchase-report-menu">
        <a href="{{  url('') }}">{{ trans('file.Monthly Purchase') }}</a>
    </li>

    <li id="sale-report-menu">
    <a id="sale-report-link" href="">{{ trans('file.Sale Report') }}</a>
</li>

<li id="sale-report-chart-menu">
    <a id="sale-report-chart-link" href="">{{ trans('file.Sale Report Chart') }}</a>
</li>

<li id="payment-report-menu">
    <a id="payment-report-link" href="">{{ trans('file.Payment Report') }}</a>
</li>

<li id="purchase-report-menu">
    <a id="purchase-report-link" href="">{{ trans('file.Purchase Report') }}</a>
</li>


    <li id="customer-report-menu">
        <a id="customer-report-link" href="{{  url('') }}">{{ trans('file.Customer Report') }}</a>
    </li>



    <li id="customer-report-menu">
        <a id="customer-group-report-link" href="{{  url('') }}">{{ trans('file.Customer Group Report') }}</a>
    </li>



    <li id="supplier-report-menu">
        <a id="supplier-report-link" href="{{  url('') }}">{{ trans('file.Supplier Report') }}</a>
    </li>

    <li id="supplier-due-report-menu">
 <a id="supplier-due-report-link" href="">{{trans('file.Supplier Due Report')}}</a>
    </li>



    <li id="warehouse-report-menu">
        <a id="warehouse-report-link" href="{{  url('') }}">{{ trans('file.Warehouse Report') }}</a>
    </li>

<li id="warehouse-stock-report-menu">
    <a href="{{ url('report.warehouseStock') }}">{{ trans('file.Warehouse Stock Chart') }}</a>
</li>

<li id="productExpiry-report-menu">
    <a href="{{ url('report.productExpiry') }}">{{ trans('file.Product Expiry Report') }}</a>
</li>

<li id="qtyAlert-report-menu">
    <a href="{{ url('report.qtyAlert') }}">{{ trans('file.Product Quantity Alert') }}</a>
</li>

<li id="daily-sale-objective-menu">
    <a href="{{ url('report.dailySaleObjective') }}">{{ trans('file.Daily Sale Objective Report') }}</a>
</li>


    <li id="user-report-menu">
        <a id="user-report-link" href="{{  url('') }}">{{ trans('file.User Report') }}</a>
    </li>

</ul>

    </li>

    @if(!config('database.connections.saleprosaas_landlord'))

            <li><a href="{{url('addon-list')}}" id="addon-list"> <i class="dripicons-flag"></i><span>{{ trans('file.Addons') }}</span></a></li>

            @if(\Schema::hasColumn('products' , 'woocommerce_product_list'))
<li><a href="{{ url('Woocommerce.index') }}"> <i class="fa fa-wordpress"></i><span>WooCommerce</span></a></li>
@endif
@if(in_array('ecommerce', explode(',' , $general_setting->modules)))
<li><a href="#ecommerce" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-shopping-bag"></i><span>{{trans('file.ecommerce')}}</span></a>
    <ul id="ecommerce" class="collapse list-unstyled ">
        @include('ecommerce::backend.layout.sidebar-menu')
    </ul>
</li>
@endif
@endif

<li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-gear"></i><span>{{trans('file.settings')}}</span></a>
    <ul id="setting" class="collapse list-unstyled ">
        <li id="role-menu"><a href="">{{trans('file.Role Permission')}}</a></li>
        <li id="custom-field-list-menu"><a href="">{{trans('file.Custom Field List')}}</a></li>
        <li id="discount-plan-list-menu"><a href="">{{trans('file.Discount Plan')}}</a></li>
        <li id="discount-list-menu"><a href="">{{trans('file.Discount')}}</a></li>
        <li id="notification-list-menu"><a href="">{{trans('file.All Notification')}}</a></li>
        <li id="notification-menu"><a href="" id="send-notification">{{trans('file.Send Notification')}}</a></li>
        <li id="warehouse-menu"><a href="">{{trans('file.Warehouse')}}</a></li>
        <li id="table-menu"><a href="">{{trans('file.Tables')}}</a></li>
        <li id="customer-group-menu"><a href="">{{trans('file.Customer Group')}}</a></li>
        <li id="brand-menu"><a href="">{{trans('file.Brand')}}</a></li>
        <li id="unit-menu"><a href="">{{trans('file.Unit')}}</a></li>
        <li id="currency-menu"><a href="">{{trans('file.Currency')}}</a></li>
        <li id="tax-menu"><a href="">{{trans('file.Tax')}}</a></li>
        <li id="user-menu"><a href="">{{trans('file.User Profile')}}</a></li>
        <li id="create-sms-menu"><a href="">{{trans('file.Create SMS')}}</a></li>
        <li><a href="">{{trans('file.Backup Database')}}</a></li>
        <li id="general-setting-menu"><a href="">{{trans('file.General Setting')}}</a></li>
        <li id="mail-setting-menu"><a href="">{{trans('file.Mail Setting')}}</a></li>
        <li id="reward-point-setting-menu"><a href="">{{trans('file.Reward Point Setting')}}</a></li>
        <li id="sms-setting-menu"><a href="">{{trans('file.SMS Setting')}}</a></li>
        <li id="pos-setting-menu"><a href="">POS {{trans('file.settings')}}</a></li>
        <li id="hrm-setting-menu"><a href="">{{trans('file.HRM Setting')}}</a></li>
    </ul>
</li>

<li><a target="_blank" href="{{url('/documentation')}}"> <i class="dripicons-information"></i><span>Documentation</span></a></li>

</ul>

