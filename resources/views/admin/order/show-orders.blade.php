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
                                    @foreach ($orders as $order)
                                    <tr class="align-middle">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$order->invoice_number}}</td>
                                        <td>
                                            Name: {{$order->name}} <br>
                                            Phone: {{$order->phone}} <br>
                                            Address: {{$order->address}}
                                        </td>
                                        <td>
                                            @foreach ($order->orderDetails as $details)
                                                <img src="{{asset('admin/product/'.$details->product->image)}}" height="50" width="50"> <br>
                                                {{$details->product->name}} X {{$details->qty}} <br>
                                            @endforeach
                                        </td>
                                        <td>{{$order->charge}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->courier_name ?? "Not Found"}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>
                                            <a href="{{url('/admin/order-details/'.$order->id)}}"><span class="badge text-bg-info">Details</span></a>
                                            <a href="#" onclick="return confirm('Are you sure?')"><span class="badge text-bg-danger">Delete</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$orders->links('pagination::bootstrap-5')}}
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
