@extends('admin.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Category List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category List</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Invoice Number</th>
                                        <th>Customer Info</th>
                                        <th>Products</th>
                                        <th>Charge</th>
                                        <th>Price</th>
                                        <th>Courier</th>
                                        <th>Status</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($categories as $category) --}}
                                    <tr class="align-middle">
                                        <td>1</td>
                                        <td>XYZ-1</td>
                                        <td>
                                            Name: Mr.X <br>
                                            Phone: 01XXXXXXXXX <br>
                                            Address: Uttara, Dhaka
                                        </td>
                                        <td>
                                            <img src="https://placehold.co/50X50"> <br>
                                            Smart Watch X 2 <br>

                                            <img src="https://placehold.co/50X50"> <br>
                                            Smart Watch X 2 <br>

                                            <img src="https://placehold.co/50X50"> <br>
                                            Smart Watch X 2 <br>
                                        </td>
                                        <td>80</td>
                                        <td>1280</td>
                                        <td>Steadfast</td>
                                        <td>Pending</td>
                                        <td>
                                            <a href="#"><span class="badge text-bg-info">Details</span></a>
                                            <a href="#" onclick="return confirm('Are you sure?')"><span class="badge text-bg-danger">Delete</span></a>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- {{$categories->links('pagination::bootstrap-5')}} --}}
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
