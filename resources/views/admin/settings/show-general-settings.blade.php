@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Edit Settings</div>
            </div>
            <form action="{{url('/admin/show-general-setting/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address (*)</label>
                        <textarea class="form-control" name="address" id="address" required>{{$settings->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone (*)</label>
                        <input type="text" name="phone" id="phone" value="{{$settings->phone}}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email (*)</label>
                        <input type="email" name="email" id="email" value="{{$settings->email}}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook Link (Optional)</label>
                        <input type="text" name="facebook" id="facebook" value="{{$settings->facebook}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter Link (Optional)</label>
                        <input type="text" name="twitter" id="twitter" value="{{$settings->twitter}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram Link (Optional)</label>
                        <input type="text" name="instagram" id="instagram" value="{{$settings->instagram}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">Youtube Link (Optional)</label>
                        <input type="text" name="youtube" id="youtube" value="{{$settings->youtube}}" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="logo" name="logo"/>
                        <label class="input-group-text" for="logo">Logo</label>
                    </div>
                    <img src="{{asset('admin/settings/'.$settings->logo)}}" height="60" width="150">

                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="hero_banner" name="hero_banner"/>
                        <label class="input-group-text" for="hero_banner">Hero Banner</label>
                    </div>
                    <img src="{{asset('admin/settings/'.$settings->hero_banner)}}" height="400" width="1000">

                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="top_banner1" name="top_banner1"/>
                        <label class="input-group-text" for="top_banner1">Top Banner1</label>
                    </div>
                    <img src="{{asset('admin/settings/'.$settings->top_banner1)}}" height="300" width="500">

                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="top_banner2" name="top_banner2"/>
                        <label class="input-group-text" for="top_banner2">Top Banner2</label>
                    </div>
                    <img src="{{asset('admin/settings/'.$settings->top_banner2)}}" height="300" width="500">

                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="top_banner3" name="top_banner3"/>
                        <label class="input-group-text" for="top_banner3">Top Banner3</label>
                    </div>
                    <img src="{{asset('admin/settings/'.$settings->top_banner3)}}" height="300" width="500">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
