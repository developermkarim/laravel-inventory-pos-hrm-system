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

@push('scripts')

<script type="text/javascript">

$('ul#product').siblings('a').attr('aria-expanded', 'true');
$('ul#product').addClass('show');
$('ul#product #category-menu').addClass('active');


function confirmDelete(){
    if(confirm('if you delete category, All products under this category will also be deleted. Are you sure want to delete?')){
        return true;
    }
    return false;
}

/* Set Multiple Category Ids and user_verified from Env */
var category_id = [];
var user_verified = {{ json_encode(env('USER_VARIFIED')) }}
/*  This is once csrf token setup for every request post/put/delete */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

/* This is for Modal Edit */
$(document).on('click' , '.open-EditCategoryDialog' , function(){

});

/* This is for Category Data loading and data deleting */
    // console.log('this is for log testing');

$('#category-table').DataTable({

    "processing" : true,
    "serverSide" : true,
    "ajax" :{
        url : 'category/category-data',
        dataType : 'json',
        type: 'post',
    },
    'createdRow': function(row, data, dataIndex){
        $(row).attr('data-id' , data['id']);
    },
    'columns': [
        {'data': 'key'},
        {'data' : 'name'},
        {'data' : 'parent_id'},
        {'data' : 'number_of_product'},
        {'data' : 'stock_qty'},
        {'data' : 'stock_worth'},
        {'data' : 'options'}

    ],
    'language' : {

        'lengthMenu' : '_MENU_ {{ trans('file.records per page') }}',
        'info' : '<small>{{ trans('file.Showing') }} _START_ - _END_ (_TOTAL_)</small>',
        'search' : '{{ trans('file.Search') }}',

        'paginate' : {
            'previous' : '<i class="dripicons-chevron-left"></i>',
            'next' : '<i class="dripicons-chevron-right"></i>'
        }
    },

    order:[['2' , 'asc']],
    'columnDefs' : [
        {
            "orderable" : false,
            'tergets' : [0, 1, 3, 4, 5, 6]
        },
        {
            'render' : function(data, type, row, meta){
                if(type === 'display'){
                    data = "<div class='checkbox'> <input type='checkbox' class='dt-checkboxes'> <label></label></div>";
                }

                return data;
            },
            'checkboxes' : {
                'selectRow' : true,
                'selectAllRender' : '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
            },
            'tergets' : [0]
        }
    ],

    'select' : {style : 'multi' , selector : 'td-first-child'},
    'lengthMenu' : [[10 , 25, 50, -1] , [10, 25, 50, 'All']],
    dom: '<"row"1fB>rtip',
    buttons : [
        {
            extend : 'pdf',
            text : '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
            exportOptions : {
                columns : ':visible:Not(.not-exported)' ,
                rows : ':visible'
            },
            footer : true,
        },
        {
            extend : 'excel',
            text : '<i title="Export to excel" class="dripicons-document-new"></i>',
            exportOptions : {
                columns : ':visible:Not(.not-exported)',
                rows : ':visible'
            },
            footer: true,
        },
        {
        extend : 'csv',
        text : '<i title="export to csv" class="fa fa-file-text-o"></i>',
        exportOptions: {
            columns : ':visible:Not(.not-exported)',
            rows : ':visible'
        },
        footer: true
        },
       {
                extend: 'print',
                text: '<i title="print" class="fa fa-print"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
                footer:true
            },

        {
            text : '<i title="delete" class="dripicons-cross"></i>',
            className: 'buttons-delete',
            action: function(e, dt, node, config){
                if(user_verified = '1'){
                    category_id.length = 0;
                    $(':checkbox:checked').each(function(i){
                        if(i){
                            category_id[i-1] = $(this).closest('tr').data('id');
                        }
                    });
                    if(category_id.length && confirm("If you delete category all products under this category will also be deleted. Are you sure wnat to delete")){
                        $.ajax({
                                type:'POST',
                                url:'category/deletebyselection',
                                data:{
                                    categoryIdArray : category_id
                                },
                                success:function(data){
                                    dt.rows({page: 'current' , selected: true}).deselect();
                                    dt.rows({page: 'current' , selected: true}).remove().draw(false);
                                }
                        });
                    }else if(!category_id.length){
                        alert('No Category is selected');
                    }
                }
                else{
                    alert('This Feature is disable for demo');
                }
            }
        },
        {
            extend: 'colvis',
            text: '<i title="column visibility" class="fa fa-eye"></i>',
            columns: ':gt(0)'
        }


    ]

})

</script>

@endpush

