@extends('admin.master')

@section('content')
    <div class="container">
        <form action="{{url('/admin/order-update/'.$order->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-header">
                            <div class="card-title">Customer Info</div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Invoice Number</label>
                                <input type="text" class="form-control" id="name" value="{{$order->invoice_number}}" name="name"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="pending" @if ($order->status == "pending")
                                        selected
                                    @endif>Pending</option>
                                    <option value="cancelled" @if ($order->status == "cancelled")
                                        selected
                                    @endif>Cancelled</option>
                                    <option value="confirmed" @if ($order->status == "confirmed")
                                        selected
                                    @endif>Confirmed</option>
                                    <option value="delivered" @if ($order->status == "delivered")
                                        selected
                                    @endif>Delivered</option>
                                    <option value="returned" @if ($order->status == "returned")
                                        selected
                                    @endif>Returned</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Customer Name (*)</label>
                                <input type="text" class="form-control" id="name" value="{{$order->name}}" name="name"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Customer Phone (*)</label>
                                <input type="text" class="form-control" id="phone" value="{{$order->phone}}" name="phone"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="charge" class="form-label">Area (*)</label>
                                <select name="charge" class="form-control" id="charge">
                                    <option value="80" @if ($order->charge == 80)
                                        selected
                                    @endif>Inside Dhaka (80)</option>
                                    <option value="150" @if ($order->charge == 150)
                                        selected
                                    @endif>Outside Dhaka (150)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Customer Address (*)</label>
                                <textarea class="form-control" id="address" name="address" required>{{$order->address}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="courier_name" class="form-label">Select Courier (Optional)</label>
                                <select name="courier_name" class="form-control" id="courier_name">
                                    <option selected disabled>Select Courier</option>
                                    <option value="steadfast" @if ($order->courier_name == "steadfast")
                                        selected
                                    @endif>Steadfast</option>
                                    <option value="pathao" @if ($order->courier_name == "pathao")
                                        selected
                                    @endif>Pathao</option>
                                    <option value="others" @if ($order->courier_name == "others")
                                        selected
                                    @endif>Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-header">
                            <div class="card-title">Product Info</div>
                        </div>
                        <div class="card-body">
                            @foreach ($order->orderDetails as $details)
                                <div class="container mb-2" id="subForm" data-id={{$details->id}}>
                                <img src="{{asset('admin/product/'.$details->product->image)}}" height="50" width="50">
                                {{$details->product->name}} X {{$details->price}}<br>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            value="{{$details->qty}}" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price" id="price"
                                            value="{{$details->price}}" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" id="color"
                                            value="{{$details->color}}">
                                    </div>
                                    <div class="col-2">
                                        <label for="size" class="form-label">Size</label>
                                        <input type="text" class="form-control" name="size" id="size"
                                            value="{{$details->size}}">
                                    </div>
                                    <div class="col-3" style="margin-top:32px">
                                        <input type="button" class="form-control" onclick="submitForm({{$details->id}})" style="background-color:#157347; color:white" name="qty" id="qty"
                                            value="Update">
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="mb-3">
                                <label for="price" class="form-label">Total Price (*)</label>
                                <input type="number" class="form-control" id="price" value="{{$order->price}}" name="price" required />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        function submitForm(id){

            subForm = document.querySelector('#subForm[data-id="'+id+'"]');

            formData = new FormData();

            formData.append('_token', '{{csrf_token()}}');
            formData.append('qty', subForm.querySelector('[name="qty"]').value);
            formData.append('price', subForm.querySelector('[name="price"]').value);
            formData.append('color', subForm.querySelector('[name="color"]').value);
            formData.append('size', subForm.querySelector('[name="size"]').value);

            fetch('/admin/order-detaisl-update/'+id, {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data =>{
                alert("Updated Successfully!");
            });
        }
    </script>
@endpush
