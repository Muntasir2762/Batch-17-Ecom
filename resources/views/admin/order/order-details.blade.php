@extends('admin.master')

@section('content')
    <div class="container">
        <form action="{{ url('/admin/store/category') }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="name" value="XYZ-1" name="name"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Customer Name (*)</label>
                                <input type="text" class="form-control" id="name" value="Mr.X" name="name"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Customer Phone (*)</label>
                                <input type="text" class="form-control" id="phone" value="01XXXXXXXXX" name="phone"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="charge" class="form-label">Area (*)</label>
                                <select name="charge" class="form-control" id="charge">
                                    <option value="80">Inside Dhaka (80)</option>
                                    <option value="150">Outside Dhaka (150)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Customer Address (*)</label>
                                <textarea class="form-control" id="address" name="address" required>Uttara, Dhaka</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="courier_name" class="form-label">Select Courier (Optional)</label>
                                <select name="courier_name" class="form-control" id="courier_name">
                                    <option selected disabled>Select Courier</option>
                                    <option value="steadfast">Steadfast</option>
                                    <option value="pathao">Pathao</option>
                                    <option value="others">Others</option>
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
                            <div class="container mb-2">
                                <img src="https://placehold.co/50x50" height="50" width="50">
                                Smart Watch X 1200<br>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            value="1" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" id="color"
                                            value="blue">
                                    </div>
                                    <div class="col-4">
                                        <label for="size" class="form-label">Size</label>
                                        <input type="text" class="form-control" name="size" id="size"
                                            value="M">
                                    </div>
                                </div>
                            </div>

                            <div class="container mb-2">
                                <img src="https://placehold.co/50x50" height="50" width="50">
                                Smart Watch X 100<br>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            value="1" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" class="form-control" name="color" id="color"
                                            value="red">
                                    </div>
                                    <div class="col-4">
                                        <label for="size" class="form-label">Size</label>
                                        <input type="text" class="form-control" name="size" id="size"
                                            value="L">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Total Price (*)</label>
                                <input type="number" class="form-control" id="price" value="400" name="price" required />
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
