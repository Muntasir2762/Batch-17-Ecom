@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Edit Policies</div>
            </div>
            <form action="{{url('/admin/update-policies')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="summernote" class="form-label">About Us (*)</label>
                        <textarea name="about_us" id="summernote" placeholder="Enter about us content*" required>{{$policies->about_us}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summernote1" class="form-label">Return Process (*)</label>
                        <textarea name="return_process" id="summernote1" placeholder="Enter return process content*" required>{{$policies->return_process}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summernote2" class="form-label">Privacy Policy (*)</label>
                        <textarea name="privacy_policy" id="summernote2" placeholder="Enter privacy policy content*" required>{{$policies->privacy_policy}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summernote3" class="form-label">Terms & Conditions (*)</label>
                        <textarea name="terms_conditions" id="summernote3" placeholder="Enter terms conditions content*" required>{{$policies->terms_conditions}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summernote4" class="form-label">Refund Policy (*)</label>
                        <textarea name="refund_policy" id="summernote4" placeholder="Enter refund policy content*" required>{{$policies->refund_policy}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summernote5" class="form-label">Payment Policy (*)</label>
                        <textarea name="payment_policy" id="summernote5" placeholder="Enter payment policy content*" required>{{$policies->payment_policy}}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote3').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote4').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote5').summernote();
        });
    </script>
@endpush
