<!DOCTYPE html>

{{-- @php
$general_setting = DB::table('general_settings')->first();
@endphp
 --}}
<html dir="@if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl){{'rtl'}}@endif">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if(!config('database.connections.saleprosaas_landlord'))
    <link rel="icon" type="image/png" href="{{url('logo', $general_setting->site_logo)}}" />
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{url('manifest.json')}}">

        {{-- Bootstrap CSS --}}

        <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css">
        <link rel="preload" href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-select.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">


        <!-- Font Awesome CSS-->
        <link rel="preload" href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css'); ?>" as="style" onload="this.onload-null; this.rel='stylesheet'">

        <noscript>
            <link rel="stylesheet" href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css'); ?>">
        </noscript>

        <!-- Drip icon font-->
        <link rel="preload" href="<?php echo asset('vendor/dripicons/webfont.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('vendor/dripicons/webfont.css'); ?>" rel="stylesheet">
        </noscript>

        <!-- jQuery Circle-->
        <link rel="preload" href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" rel="stylesheet">
        </noscript>

        <!-- Custom Scrollbar-->
        <link rel="preload" href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet">
        </noscript>

        @if (Route::current()->getName() != '/')
            <!-- date range stylesheet-->
            <link rel="preload" href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css'); ?>" as="style"
                onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css'); ?>" rel="stylesheet">
            </noscript>

            <!-- table sorter stylesheet-->
            <link rel="preload" href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css'); ?>" as="style"
                onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
            </noscript>
            <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css"
                as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css"
                    rel="stylesheet">
            </noscript>
            <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"
                as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"
                    rel="stylesheet">
            </noscript>
        @endif

        <link rel="stylesheet" href="<?php echo asset('css/style.default.css'); ?>" id="theme-stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/dropzone.css'); ?>">

        {{-- Custom stylesheet - for your changes --}}

        <link rel="stylesheet" href="{{ asset('css/custom-' . $general_setting->theme) }}" type="text/css"
            id="custom-style">
        <!-- RTL css -->

        @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
            <!-- RTL css -->
            <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap-rtl.min.css'); ?>" type="text/css">
            <link rel="stylesheet" href="<?php echo asset('css/custom-rtl.css'); ?>" type="text/css" id="custom-style">
        @endif
    @else
        <link rel="stylesheet" type="image/png" href="{{ url('../../logo', $general_setting->site_logo) }}" />
        <title>{{ $general_setting->site_title }}</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="manifest" href="{{ url('manifest.json') }}">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css">
        <link rel="preload" href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" rel="stylesheet">
        </noscript>
        <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css'); ?>" rel="stylesheet">
        </noscript>
        <!-- Font Awesome CSS-->
        <link rel="preload" href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        </noscript>
        <!-- Drip icon font-->
        <link rel="preload" href="<?php echo asset('../../vendor/dripicons/webfont.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/dripicons/webfont.css'); ?>" rel="stylesheet">
        </noscript>

        <!-- jQuery Circle-->
        <link rel="preload" href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" rel="stylesheet">
        </noscript>
        <!-- Custom Scrollbar-->
        <link rel="preload" href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet">
        </noscript>


        @if (Route::current()->getName() != '/')
            <!-- date range stylesheet-->
            <link rel="preload" href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css'); ?>" as="style"
                onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css'); ?>" rel="stylesheet">
            </noscript>
            <!-- table sorter stylesheet-->
            <link rel="preload" href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css'); ?>" as="style"
                onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
            </noscript>
            <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css"
                as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css"
                    rel="stylesheet">
            </noscript>
            <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"
                as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript>
                <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"
                    rel="stylesheet">
            </noscript>
        @endif

        <link rel="stylesheet" href="<?php echo asset('../../css/style.default.css'); ?>" id="theme-stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('../../css/dropzone.css'); ?>">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="<?php echo asset('../../css/custom-' . $general_setting->theme); ?>" type="text/css" id="custom-style">



        @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
            <!-- RTL css -->
            <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-rtl.min.css'); ?>" type="text/css">
            <link rel="stylesheet" href="<?php echo asset('../../css/custom-rtl.css'); ?>" type="text/css" id="custom-style">
        @endif

    @endif
    <!-- Google fonts - Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" rel="stylesheet">
    </noscript>

    @stack('css')

</head>

  <body class="@if($theme == 'dark')dark-mode dripicons-brightness-low @endif  @if(Route::current()->getName() == 'sale.pos') pos-page @endif" onload="myFunction()">

    <div id="loader"></div>
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <span class="brand-big">
            @if ($general_setting->site_logo)
                <a href="{{ url('/') }}"><img src="{{ url('logo', $general_setting->site_logo) }}"
                        width="115"></a>
            @else
                <a href="{{ url('/') }}">
                    <h1 class="d-inline">{{ $general_setting->site_title }}</h1>
                </a>
            @endif
        </span>
        @include('backend.layout.sidebar')

    </nav>

     {{-- {{ $categories_list }} --}}

<div class="page">
        <!-- navbar-->
            <header class="container-fluid">
        <nav class="navbar">
            <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>

            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <div class="dropdown">
              <a class="btn-pos btn-sm" type="button" data-toggle="dropdown" aria-expanded="false">
                <i class="dripicons-plus"></i>
              </a>
              <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a data-toggle="modal" data-target="#category-modal">Add Category</a></li>
                                                                <li class="dropdown-item"><a href="http://127.0.0.1:8000/products/create">Add Product</a></li>
                                                                <li class="dropdown-item"><a href="http://127.0.0.1:8000/purchases/create">Add Purchase</a></li>
                                                                <li class="dropdown-item"><a href="http://127.0.0.1:8000/sales/create">Add Sale</a></li>

                              </ul>
            </div>
                                    <li class="nav-item"><a class="btn-pos btn-sm" href="http://127.0.0.1:8000/pos"><i class="dripicons-shopping-bag"></i><span> POS</span></a></li>


            <li class="nav-item"><a id="switch-theme" data-toggle="tooltip" title="{{'file.Switch Theme'}}"><i class="dripicons-brightness-max"></i></a></li>

            <li class="nav-item"><a id="btnFullscreen" data-toggle="tooltip" title="{{ "file.Switch Theme" }}"><i class="dripicons-expand"></i></a></li>



                            <li class="nav-item"><a href="http://127.0.0.1:8000/cash-register" data-toggle="tooltip" title="" data-original-title="Cash Register List"><i class="dripicons-archive"></i></a></li>

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ trans('file.language') }}">
        <i class="dripicons-web"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
        <a class="dropdown-item" href="{{ route('language.switch' , 'en') }}">English</a>
        <a class="dropdown-item" href="{{ route('language.switch' , 'es') }}">Espanol</a>
        <a class="dropdown-item" href="{{ route('language.switch' , 'ar') }}">عربى</a>
    </div>

</li>


            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Admin Panel">
                    <i class="dripicons-user"></i> <span>Admin</span> <i class="fa fa-angle-down"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">

                    <a class="dropdown-item" href="http://127.0.0.1:7000/user/profile/1"><i class="dripicons-user"></i> {{ trans('file.profile') }}</a>

                    <a class="dropdown-item" href="http://127.0.0.1:7000/setting/general_setting"><i class="dripicons-gear"></i> {{ trans('file.settings') }}</a>

                    <a class="dropdown-item" href="http://127.0.0.1:7000/my-transactions/2025/07"><i class="dripicons-swap"></i> My Transactions</a>

                    <a class="dropdown-item" href="http://127.0.0.1:7000/holidays/my-holiday/2025/07"><i class="dripicons-vibrate"></i> My Holiday</a>

                    <a class="dropdown-item text-danger" href="http://127.0.0.1:7000/setting/empty-database" onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')">
                        <i class="dripicons-stack"></i> Empty Database
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://127.0.0.1:7000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dripicons-power"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>
                </div>
            </li>

            </ul>
        </nav>
      </header>


         <div style="display: none;" id="content" class="animate-bottom">

            @include('includes.session_message')

            @yield('content')
         </div>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>© SalePro | Developed By <span class="external">Lion Coders</span> | V 4.2.0</p>
            </div>
          </div>
        </div>
      </footer>

      <!-- notification modal -->
      <div id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Send Notification</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/notifications/store" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">
                      <div class="row">

                          <div class="col-md-4 form-group">
                                <input type="hidden" name="sender_id" value="1">
                              <label>User *</label>
                              <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="receiver_id" title="Select user..."><span class="filter-option pull-left">Select user...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select id="receiver_id" name="receiver_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select user..." tabindex="-98"><option class="bs-title-option" value="">Select user...</option>

                              </select></div>
                          </div>
                          <div class="col-md-4 form-group">
                                <label>Reminder Date</label>
                                <input type="text" name="reminder_date" class="form-control date" value="06-07-2025">
                          </div>
                          <div class="col-md-4 form-group">
                                <label>Attach Document</label>
                                <input type="file" name="document" class="form-control">
                          </div>
                          <div class="col-md-12 form-group">
                              <label>Message *</label>
                              <textarea rows="5" name="message" class="form-control" required=""></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end notification modal -->

      <!-- Category Modal -->
      <div id="category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
          <div role="document" class="modal-dialog">
            <div class="modal-content">
             {!! Form::open(['route' => 'category.store', 'method' => 'post', 'files' => true]) !!}
              <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Add Category</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
              </div>
              <div class="modal-body">
                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label>Name *</label>
                         {{ Form::text('name' , null, array('required' , 'class' => 'form-control', 'placeholder' => 'Type Category name')) }}
                      </div>
                      <div class="col-md-6 form-group">
                          <label>Image</label>
                         <x-file-upload name="image"  label="Upload Category Image" />
                      </div>
                      <div class="col-md-6 form-group">
                          <label>Parent Category</label>
                         <select name="parent_id" class="form-control selectpicker" id="parent">

                            <option value="">No Parent</option>
                            @foreach ($categories_list as $category)

                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                         </select>
                      </div>

                      @if(\Schema::hasColumn('categories', 'woocommerce_category_id'))
                      <div class="col-md-6 form-group mt-4">
                        <h5><input name="is_sync_disable" type="checkbox" id="is_sync_disable" value="1">
                            &nbsp; Disable Wommcommerce Sync
                        </h5>
                      </div>

                      @endif

                      @if(in_array('ecommerce' , explode(',' , $general_setting->modules)))
                        <div class="col-md-12 mt-3">
                            <h6><strong>{{ __('For Website') }}</strong></h6>
                            <hr>
                        </div>
                           <div class="col-md-6 form-group">
                        <label>{{ __('Icon') }} (SVG format)</label>
                        <input type="file" name="icon" class="form-control">
                      </div>
                      @endif

                    <div class="col-md-6 form-group">
                          <br>
                          <input type="checkbox" name="featured" id="featured" value="1"> <label>{{ __('List on category dropdown') }}</label>
                      </div>

                  </div>

            @if(in_array('ecommerce',explode(',',$general_setting->modules)))
                  <div class="row">
                      <div class="col-md-12 mt-3">
                          <h6><strong>{{ __('For SEO') }}</strong></h6>
                          <hr>
                      </div>
                      <div class="col-md-12 form-group">
                          <label>{{ __('Meta Title') }}</label>
                          {{Form::text('page_title',null,array('class' => 'form-control', 'placeholder' => 'Meta Title...'))}}
                      </div>
                      <div class="col-md-12 form-group">
                          <label>{{ __('Meta Description') }}</label>
                          {{Form::text('short_description',null,array('class' => 'form-control', 'placeholder' => 'Meta Description...'))}}
                      </div>
                  </div>
                  @endif

                   <div class="form-group">
                    <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                  </div>

              </div>
             {{ Form::close() }}
            </div>
          </div>
      </div>
      <!-- Category Modal -->

      <!-- expense modal -->
      <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Add Expense</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/expenses" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Date</label>
                            <input type="text" name="created_at" class="form-control date" placeholder="Choose date">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Expense Category *</label>
                            <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="expense_category_modal_id" title="Select Expense Category..."><span class="filter-option pull-left">Select Expense Category...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="expense_category_id" id="expense_category_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select Expense Category..." tabindex="-98"><option class="bs-title-option" value="">Select Expense Category...</option>

                            </select></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Warehouse *</label>
                            <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="expense_modal_warehouse_id" title="Select Warehouse..."><span class="filter-option pull-left">Select Warehouse...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="warehouse_id" id="expense_modal_warehouse_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select Warehouse..." tabindex="-98"><option class="bs-title-option" value="">Select Warehouse...</option>

                            </select></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Amount *</label>
                            <input type="number" name="amount" step="any" required="" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Account</label>
                            <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="expense_modal_account_id" title="Nothing selected"><span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select class="form-control selectpicker" name="account_id" id="expense_modal_account_id" tabindex="-98">

                            </select></div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Note</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end expense modal -->

      <!-- sale return modal -->
      <div id="add-sale-return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
          <div role="document" class="modal-dialog">
            <div class="modal-content">
              <form method="GET" action="http://127.0.0.1:8000/return-sale/create" accept-charset="UTF-8">
              <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Add Sale Return</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
              </div>
              <div class="modal-body">
                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                 <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Sale Reference *</label>
                              <input type="text" name="reference_no" class="form-control">
                          </div>
                      </div>
                 </div>
                  <input class="btn btn-primary" type="submit" value="Submit">
              </div>
              </form>
            </div>
          </div>
      </div>
      <!-- end sale return modal -->

      <!-- purchase return modal -->
      <div id="add-purchase-return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
          <div role="document" class="modal-dialog">
            <div class="modal-content">
              <form method="GET" action="http://127.0.0.1:8000/return-purchase/create" accept-charset="UTF-8">
              <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Add Purchase Return</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
              </div>
              <div class="modal-body">
                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                 <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Purchase Reference *</label>
                              <input type="text" name="reference_no" class="form-control">
                          </div>
                      </div>
                 </div>
                  <input class="btn btn-primary" type="submit" value="Submit">
              </div>
              </form>
            </div>
          </div>
      </div>
      <!-- end purchase return modal -->

      <!-- account modal -->
      <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Add Account</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/accounts" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">
                      <div class="form-group">
                          <label>Account No *</label>
                          <input type="text" name="account_no" required="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Name *</label>
                          <input type="text" name="name" required="" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Initial Balance</label>
                          <input type="number" name="initial_balance" step="any" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Note</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end account modal -->

      <!-- account statement modal -->
      <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Account Statement</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/account-statement" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Account</label>
                            <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="account_statement_modal_id" title="Nothing selected"><span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select class="form-control selectpicker" name="account_id" id="account_statement_modal_id" tabindex="-98">

                            </select></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Type</label>
                            <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-link" data-toggle="dropdown" role="button" title="All"><span class="filter-option pull-left">All</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0" class="dropdown-item selected" data-original-index="0"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="true"><span class="text">All</span><span class="fa fa-check check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Debit</span><span class="fa fa-check check-mark"></span></span></a><a tabindex="0" class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner " data-tokens="null" role="option" tabindex="0" aria-disabled="false" aria-selected="false"><span class="text">Credit</span><span class="fa fa-check check-mark"></span></span></a></div></div><select class="form-control selectpicker" name="type" tabindex="-98">
                                <option value="0">All</option>
                                <option value="1">Debit</option>
                                <option value="2">Credit</option>
                            </select></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Choose Your Date</label>
                            <div class="input-group">
                                <input type="text" class="account-statement-daterangepicker-field form-control" required="">
                                <input type="hidden" name="start_date">
                                <input type="hidden" name="end_date">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end account statement modal -->

      <!-- warehouse modal -->
      <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Warehouse Report</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/report/warehouse_report" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">

                      <div class="form-group">
                          <label>Warehouse *</label>
                          <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="warehouse_modal_id" title="Select warehouse..."><span class="filter-option pull-left">Select warehouse...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="warehouse_id" id="warehouse_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select warehouse..." tabindex="-98"><option class="bs-title-option" value="">Select warehouse...</option>

                          </select></div>
                      </div>

                      <input type="hidden" name="start_date" value="2025-07-01">
                      <input type="hidden" name="end_date" value="2025-07-06">

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end warehouse modal -->

      <!-- user modal -->
      <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">User Report</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/report/user_report" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">

                      <div class="form-group">
                          <label>User *</label>
                          <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="user_modal_id" title="Select user..."><span class="filter-option pull-left">Select user...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="user_id" id="user_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select user..." tabindex="-98"><option class="bs-title-option" value="">Select user...</option>
                          </select></div>
                      </div>

                      <input type="hidden" name="start_date" value="2025-07-01">
                      <input type="hidden" name="end_date" value="2025-07-06">

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end user modal -->

      <!-- customer modal -->
      <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Customer Report</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/report/customer_report" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">

                      <div class="form-group">
                          <label>Customer *</label>
                          <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="customer_modal_id" title="Select customer..."><span class="filter-option pull-left">Select customer...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="customer_id" id="customer_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select customer..." tabindex="-98"><option class="bs-title-option" value="">Select customer...</option>

                          </select></div>
                      </div>

                      <input type="hidden" name="start_date" value="2025-07-01">
                      <input type="hidden" name="end_date" value="2025-07-06">

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end customer modal -->

      <!-- customer group modal -->
      <div id="customer-group-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Customer Group Report</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/report/customer-group" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">

                      <div class="form-group">
                          <label>Customer Group *</label>
                          <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="customer_group_modal_id" title="Select customer group..."><span class="filter-option pull-left">Select customer group...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="customer_group_id" id="customer_group_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select customer group..." tabindex="-98"><option class="bs-title-option" value="">Select customer group...</option>

                          </select></div>
                      </div>

                      <input type="hidden" name="start_date" value="2025-07-01">
                      <input type="hidden" name="end_date" value="2025-07-06">

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end customer group modal -->

      <!-- supplier modal -->
      <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Supplier Report</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                    <form method="POST" action="http://127.0.0.1:8000/report/supplier" accept-charset="UTF-8"><input name="_token" type="hidden" value="50CJUmKUXLX9HVE6xz4XNIvK3luVDRToYiRfUT70">
                      <div class="form-group">
                          <label>Supplier *</label>
                          <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown" role="button" data-id="supplier_modal_id" title="Select Supplier..."><span class="filter-option pull-left">Select Supplier...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="dropdown-menu inner" role="listbox" aria-expanded="false"></div></div><select name="supplier_id" id="supplier_modal_id" class="selectpicker form-control" required="" data-live-search="true" data-live-search-style="begins" title="Select Supplier..." tabindex="-98"><option class="bs-title-option" value="">Select Supplier...</option>

                          </select></div>
                      </div>

                      <input type="hidden" name="start_date" value="2025-07-01">
                      <input type="hidden" name="end_date" value="2025-07-06">

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- end supplier modal -->
    </div>
  @if(!config('database.connections.saleprosaas_landlord'))
        <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/jquery/bootstrap-datepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.timepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/popper.js/umd/popper.min.js') ?>">
        </script>
        <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>
        @if(Route::current()->getName() == 'sale.pos')
        <script type="text/javascript" src="<?php echo asset('vendor/keyboard/js/jquery.keyboard.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/keyboard/js/jquery.keyboard.extension-autocomplete.js') ?>"></script>
        @endif
        <script type="text/javascript" src="<?php echo asset('js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/jquery.cookie/jquery.cookie.js') ?>">
        </script>
        <script type="text/javascript" src="<?php echo asset('vendor/chart.js/Chart.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/charts-custom.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/jquery-validation/jquery.validate.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
        @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
          <script type="text/javascript" src="<?php echo asset('js/front_rtl.js') ?>"></script>
        @else
          <script type="text/javascript" src="<?php echo asset('js/front.js') ?>"></script>
        @endif

        @if(Route::current()->getName() != '/')
        <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/moment.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/daterangepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/dropzone.js') ?>"></script>

        <!-- table sorter js-->
        @if( Config::get('app.locale') == 'ar')
            <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake_arabic.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts_arabic.js') ?>"></script>
        @else
            <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts.js') ?>"></script>
        @endif

        <script type="text/javascript" src="<?php echo asset('vendor/datatable/jquery.dataTables.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.buttons.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/jszip.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.bootstrap4.min.js') ?>">"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.colVis.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.html5.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.printnew.js') ?>"></script>

        <script type="text/javascript" src="<?php echo asset('vendor/datatable/sum().js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.checkboxes.min.js') ?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        @endif
    @else
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/bootstrap-datepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.timepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/popper.js/umd/popper.min.js') ?>">
        </script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>

        <script type="text/javascript" src="<?php echo asset('../../js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery.cookie/jquery.cookie.js') ?>">
        </script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/chart.js/Chart.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../js/charts-custom.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/jquery-validation/jquery.validate.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
        @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
          <script type="text/javascript" src="<?php echo asset('../../js/front_rtl.js') ?>"></script>
        @else
          <script type="text/javascript" src="<?php echo asset('../../js/front.js') ?>"></script>
        @endif

        @if(Route::current()->getName() != '/')
        <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/moment.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/daterangepicker.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../js/dropzone.js') ?>"></script>

        <!-- table sorter js-->
        @if( Config::get('app.locale') == 'ar')
            <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake_arabic.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts_arabic.js') ?>"></script>
        @else
            <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake.min.js') ?>"></script>
            <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts.js') ?>"></script>
        @endif
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/jquery.dataTables.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.buttons.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.bootstrap4.min.js') ?>">"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.colVis.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.html5.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.printnew.js') ?>"></script>

        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/sum().js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.checkboxes.min.js') ?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        @endif
    @endif

    @stack('scripts')


     <script type="text/javascript">

        var theme = <?php echo json_encode($theme); ?>;
        if(theme == 'dark') {
            $('body').addClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-low');
        }
        else {
            $('body').removeClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-max');
        }
        $('#switch-theme').click(function() {
            if(theme == 'light') {
                theme = 'dark';
                var url = <?php echo json_encode(route('switchTheme', 'dark')); ?>;
                $('body').addClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-low');
            }
            else {
                theme = 'light';
                var url = <?php echo json_encode(route('switchTheme', 'light')); ?>;
                $('body').removeClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-max');
            }


            console.log("before request : " , document.cookie);

            $.get(url, function(data) {

                console.log("after request : " , document.cookie);

                console.log('theme changed to '+theme);
            });
        });

     </script>


    <script>

               function myFunction(){
            setTimeout(showPage, 100)
        }

        function showPage(){
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";
        }


        </script>


        <script>
document.querySelectorAll('.file-drop-zone').forEach(dropZone => {
    const input = dropZone.querySelector('input');
    const preview = dropZone.querySelector('.preview');

    dropZone.addEventListener('click', () => {
        input.click();
    });

    dropZone.addEventListener('dragover', e => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        if (e.dataTransfer.files.length > 0) {
            const file = e.dataTransfer.files[0];
            input.files = e.dataTransfer.files;
            previewFile(file, preview);
        }
    });

    // ✅ NEW: Paste from clipboard support
    dropZone.addEventListener('paste', e => {
        const items = (e.clipboardData || window.clipboardData).items;
        for (let i = 0; i < items.length; i++) {
            if (items[i].type.indexOf('image') !== -1) {
                const file = items[i].getAsFile();
                if (file) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    input.files = dataTransfer.files;
                    previewFile(file, preview);
                }
            }
        }
    });

    // Focus to enable paste event
    dropZone.addEventListener('focus', () => {
        dropZone.classList.add('focused');
    });

    dropZone.addEventListener('blur', () => {
        dropZone.classList.remove('focused');
    });

    input.addEventListener('change', () => {
        if (input.files.length > 0) {
            previewFile(input.files[0], preview);
        }
    });

    // Prevent typing in the editable drop zone
    dropZone.addEventListener('keydown', e => {
    // Allow: Tab, Ctrl, Cmd, etc., but block regular typing
    if (!e.ctrlKey && !e.metaKey && e.key !== "Tab") {
        e.preventDefault();
    }

    });

    function previewFile(file, container) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = () => {
            container.innerHTML = `<img src="${reader.result}" alt="Preview" class="img-fluid rounded mt-2">`;
        };
        reader.readAsDataURL(file);
    }
});
</script>


</body>

</html>
