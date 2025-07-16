@extends('backend.layout.main')

@section('content')
    {{-- Success and Fail Message Show Here --}}

   {{-- {{ $errors }} --}}

   @if($errors->has('name'))
    <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> &times; </span></button> {{ $errors->first('name') }}
    </div>
    @endif

    @if($errors->has('image'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> &times; </span></button> {{ $errors->first('image') }}
    </div>
    @endif

    @if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif

@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

    {{-- Data Show Section Here --}}

    <section>

        <div class="container-fluid">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#category-modal"><i
                    class="dripicons-plus"></i>{{ trans('file.Add Category') }}</button>&nbsp;
            <button class="btn btn-primary" data-toggle="modal" data-target="#importCategory"><i class="dripicons-copy"></i>
                {{ trans('file.Import Category') }}</button>
        </div>

    <div class="table-responsive">
        <table id="category-table" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>{{trans('file.category')}}</th>
                    <th>{{trans('file.Parent Category')}}</th>
                    <th>{{trans('file.Number of Product')}}</th>
                    <th>{{trans('file.Stock Quantity')}}</th>
                    <th>{{trans('file.Stock Worth (Price/Cost)')}}</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
        </table>
    </div>
    </section>


    {{-- Edit Modal Here --}}

    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">

                {{Form::open(['route' => ['category.update' , 1], 'method' => 'PUT', 'files' => true]) }}

                <h5 id="exampleModalLabel" class="modal-title">Update Category</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name *</label>
                                <input required="required" class="form-control" name="name" type="text">
                            </div>
                            <input type="hidden" name="category_id">
                            <div class="col-md-6 form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Parent Category</label>
                                <div class="btn-group bootstrap-select form-control"><button type="button"
                                        class="btn dropdown-toggle bs-placeholder btn-link" data-toggle="dropdown"
                                        role="button" data-id="parent" title="No Parent"><span
                                            class="filter-option pull-left">No Parent</span>&nbsp;<span
                                            class="bs-caret"><span class="caret"></span></span></button>
                                    <div class="dropdown-menu open" role="combobox">
                                        <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a
                                                tabindex="0" class="dropdown-item selected"
                                                data-original-index="0"><span class="dropdown-item-inner "
                                                    data-tokens="null" role="option" tabindex="0"
                                                    aria-disabled="false" aria-selected="true"><span class="text">No
                                                        Parent</span><span
                                                        class="fa fa-check check-mark"></span></span></a><a tabindex="0"
                                                class="dropdown-item" data-original-index="1"><span
                                                    class="dropdown-item-inner " data-tokens="null" role="option"
                                                    tabindex="0" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Electronics</span><span
                                                        class="fa fa-check check-mark"></span></span></a></div>
                                    </div><select name="parent_id" class="form-control selectpicker" id="parent"
                                        tabindex="-98">
                                        <option value="">No Parent</option>
                                        @foreach ($categories_list as $category)

                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                {{Form::close() }}
            </div>
        </div>
    </div>

    {{-- Import Modal Here --}}


    <div id="importCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">

                {!!Form::open(['route' => 'category.import' ,'method' => 'post', 'files' => true]) !!}

                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">Import Category</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>The field labels marked with * are required input fields.</small></p>

                        <p>The correct column order is (name*, parent_category) and you must follow this.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload CSV File *</label>
                                    {{Form::file('file', array('class' => 'form-control', 'required')) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Sample File</label>
                                    <a href="sample_file/sample_category.csv" class="btn btn-info btn-block btn-md"><i
                                            class="dripicons-download"></i> Download</a>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

            </div>

            {!!Form::close() !!}

        </div>
    </div>
@endsection
