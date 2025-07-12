@extends('backend.layout.main')

@section('content')
    {{-- Success and Fail Message Show Here --}}

    <div class="alert alert-danger alert-dismissible text-center" style="display: none;"><button type="button" class="close"
            data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Category deleted successfully
    </div>

    {{-- Data Show Section Here --}}

    <section>
        <div class="container-fluid">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#category-modal"><i
                    class="dripicons-plus"></i> Add Category</button>&nbsp;
            <button class="btn btn-primary" data-toggle="modal" data-target="#importCategory"><i class="dripicons-copy"></i>
                Import Category</button>
        </div>
        <div class="table-responsive">
            <div id="category-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="dataTables_length" id="category-table_length"><label>
                            <div class="btn-group bootstrap-select form-control form-control-sm"><button type="button"
                                    class="btn dropdown-toggle btn-default btn-light" data-toggle="dropdown" role="button"
                                    title="10"><span class="filter-option pull-left">10</span>&nbsp;<span
                                        class="bs-caret"><span class="caret"></span></span></button>
                                <div class="dropdown-menu open" role="combobox">
                                    <div class="dropdown-menu inner" role="listbox" aria-expanded="false"><a tabindex="0"
                                            class="dropdown-item selected" data-original-index="0"><span
                                                class="dropdown-item-inner " data-tokens="null" role="option"
                                                tabindex="0" aria-disabled="false" aria-selected="true"><span
                                                    class="text">10</span><span
                                                    class="fa fa-check check-mark"></span></span></a><a tabindex="0"
                                            class="dropdown-item" data-original-index="1"><span class="dropdown-item-inner "
                                                data-tokens="null" role="option" tabindex="0" aria-disabled="false"
                                                aria-selected="false"><span class="text">25</span><span
                                                    class="fa fa-check check-mark"></span></span></a><a tabindex="0"
                                            class="dropdown-item" data-original-index="2"><span class="dropdown-item-inner "
                                                data-tokens="null" role="option" tabindex="0" aria-disabled="false"
                                                aria-selected="false"><span class="text">50</span><span
                                                    class="fa fa-check check-mark"></span></span></a><a tabindex="0"
                                            class="dropdown-item" data-original-index="3"><span class="dropdown-item-inner "
                                                data-tokens="null" role="option" tabindex="0" aria-disabled="false"
                                                aria-selected="false"><span class="text">All</span><span
                                                    class="fa fa-check check-mark"></span></span></a></div>
                                </div><select name="category-table_length" aria-controls="category-table"
                                    class="form-control form-control-sm" tabindex="-98">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="-1">All</option>
                                </select>
                            </div> records per page
                        </label></div>
                    <div id="category-table_filter" class="dataTables_filter"><label>Search<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="category-table"></label>
                    </div>
                    <div class="dt-buttons btn-group"> <button class="btn btn-secondary buttons-pdf buttons-html5"
                            tabindex="0" aria-controls="category-table" type="button"><span><i title="export to pdf"
                                    class="fa fa-file-pdf-o"></i></span></button> <button
                            class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                            aria-controls="category-table" type="button"><span><i title="export to excel"
                                    class="dripicons-document-new"></i></span></button> <button
                            class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                            aria-controls="category-table" type="button"><span><i title="export to csv"
                                    class="fa fa-file-text-o"></i></span></button> <button
                            class="btn btn-secondary buttons-print" tabindex="0" aria-controls="category-table"
                            type="button"><span><i title="print" class="fa fa-print"></i></span></button> <button
                            class="btn btn-secondary buttons-delete" tabindex="0" aria-controls="category-table"
                            type="button"><span><i title="delete" class="dripicons-cross"></i></span></button> <button
                            class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0"
                            aria-controls="category-table" type="button" aria-haspopup="true"><span><i
                                    title="column visibility" class="fa fa-eye"></i></span></button> </div>
                </div>
                <div id="category-table_processing" class="dataTables_processing card" style="display: none;">
                    Processing...</div>
                <table id="category-table" class="table dataTable no-footer" style="width: 100%;" role="grid"
                    aria-describedby="category-table_info">
                    <thead>
                        <tr role="row">
                            <th class="not-exported dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled"
                                rowspan="1" colspan="1" style="width: 25px;" data-col="0" aria-label="">
                                <div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>
                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 128px;"
                                aria-label="Category">Category</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="category-table" rowspan="1"
                                colspan="1" style="width: 104px;"
                                aria-label="Parent Category: activate to sort column ascending" aria-sort="descending">
                                Parent Category</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 123px;"
                                aria-label="Number of Product">Number of Product</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 94px;"
                                aria-label="Stock Quantity">Stock Quantity</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 157px;"
                                aria-label="Stock Worth (Price/Cost)">Stock Worth (Price/Cost)</th>
                            <th class="not-exported sorting_disabled" rowspan="1" colspan="1" style="width: 80px;"
                                aria-label="Action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-id="1" role="row" class="odd">
                            <td class=" dt-checkboxes-cell">
                                <div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>
                            </td>
                            <td><img src="http://127.0.0.1:8000/images/category/20250709121529.png" height="80"
                                    width="80">Electronics</td>
                            <td class="sorting_1">N/A</td>
                            <td>0</td>
                            <td>0</td>
                            <td>$ 0 / $ 0</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default"
                                        user="menu">
                                        <li>
                                            <button type="button" data-id="1"
                                                class="open-EditCategoryDialog btn btn-link" data-toggle="modal"
                                                data-target="#editModal"><i class="dripicons-document-edit"></i>
                                                Edit</button>
                                        </li>
                                        <li class="divider"></li>
                                        <form method="POST" action="http://127.0.0.1:8000/category/1"
                                            accept-charset="UTF-8"><input name="_method" type="hidden"
                                                value="DELETE"><input name="_token" type="hidden"
                                                value="0qUVJZqy7uZVAWHQMtkTcVTCN8n6g0MLxjoseZzK">
                                            <li>
                                                <button type="submit" class="btn btn-link"
                                                    onclick="return confirmDelete()"><i class="dripicons-trash"></i>
                                                    Delete</button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="dataTables_info" id="category-table_info" role="status" aria-live="polite"><small>Showing 1
                        - 1 (1)</small></div>
                <div class="dataTables_paginate paging_simple_numbers" id="category-table_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="category-table_previous"><a
                                href="#" aria-controls="category-table" data-dt-idx="0" tabindex="0"
                                class="page-link"><i class="dripicons-chevron-left"></i></a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="category-table"
                                data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="category-table_next"><a href="#"
                                aria-controls="category-table" data-dt-idx="2" tabindex="0" class="page-link"><i
                                    class="dripicons-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    {{-- Edit Modal Here --}}

    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="http://127.0.0.1:8000/category/1" accept-charset="UTF-8"
                    enctype="multipart/form-data"><input name="_method" type="hidden" value="PUT"><input
                        name="_token" type="hidden" value="0qUVJZqy7uZVAWHQMtkTcVTCN8n6g0MLxjoseZzK">
                    <div class="modal-header">
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
                                        <option value="1">Electronics</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Import Modal Here --}}


    <div id="importCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="http://127.0.0.1:8000/category/import" accept-charset="UTF-8"
                    enctype="multipart/form-data"><input name="_token" type="hidden"
                        value="0qUVJZqy7uZVAWHQMtkTcVTCN8n6g0MLxjoseZzK">
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
                                    <input class="form-control" required="" name="file" type="file">
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
                </form>
            </div>
        </div>
    </div>
@endsection
