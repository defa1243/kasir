<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-5">
                            <h1>Transaction</h1>
                        </div>
                        <div class="col-7">
                            <a href="#order" class="btn badge btn-primary float-right mt-2">Order</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <a href="javascript:void(0)" class="btn btn-success col-4" id="showhistory"
                            onclick="showHistory()">History</a>
                        <a href="javascript:void(0)" class="btn btn-secondary col-6" id="backread" onclick="backRead()"
                            style="display: none;">Order Transaction</a>
                        <div class="col-1"></div>
                        <a href="javascript:void(0)" class="btn btn-success col-4" id="printhistory" onclick="exportdata()"
                            style="display: none;">Export Excel</a>
                    </div>
                    <div class="row d-none mt-2" id="filterbypicker">
                        <div class="col-6">
                            <select id="filterby" class="form-control" onchange="filterby()">
                                <option value="">All</option>
                                <option value="month">Month</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <a href="javascript:void(0)" onclick="applyFilter()" id="applyBtn" class="btn btn-success d-none">Apply</a>
                        </div>

                    </div>
                    <div class="row mt-2 d-none" id="picker">
                        <div class="col-6">
                            <strong >Begin</strong><br>
                            <input type="date" id="select1" class="form-control">
                        </div>
                        <div class="col-6">
                            <strong >End</strong><br>
                            <input type="date" id="select2" class="form-control">
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body" id="read">

                        </div>
                        <div class="card-body" id="order" style="display: none;">
                            <hr>
                            <h4>Order</h4>
                            <form method="post" id="orderForm">
                            </form>
                            <input type="hidden" value="1" id="orderValue">
                            <div class="mb-3">
                                <a href="javascript:void(0)" id="createOrder" class="btn btn-success
                                " onclick="createOrder()">Create Order</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary " style="display: none;" id="btn-create"
                            data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" id="modal">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
