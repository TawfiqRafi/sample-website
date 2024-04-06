@extends('layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Settings Page</h5>
        </div>
        {!! Form::open(['route' => ['settings.store'], 'method' => 'POST']) !!}
        <div class="box-body">
            <div class="form-group" style="margin-bottom:0%;">
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"></label>
                <div class="col-md-9">
                    <center>
                        <img style="width: 10%;border: 1px solid; border-radius: 10px;" id="viewer" src="{{asset($data['logo'])}}" onerror="this.src='{{ asset('assets/frontend/img/img2.jpg')}}'" alt="about image"/>
                    </center>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Logo</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" name="logo" id="customFileEg1" class="custom-file-input"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <label class="custom-file-label" for="customFileEg1">Choose Logo</label>
                    </div>
                    {{-- <input type="file" name="image" id="" placeholder="Enter image" class="form-control"> --}}
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"></label>
                <div class="col-md-9">
                    <center>
                        <img style="width: 10%;border: 1px solid; border-radius: 10px;" id="viewer2" src="{{asset($data['logo_scroll'])}}" onerror="this.src='{{ asset('assets/frontend/img/img2.jpg')}}'" alt="about image"/>
                    </center>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Logo on scroll</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" name="logo_scroll" id="customFileEg2" class="custom-file-input"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <label class="custom-file-label" for="customFileEg2">Choose Logo</label>
                    </div>
                    {{-- <input type="file" name="image" id="" placeholder="Enter image" class="form-control"> --}}
                    <span class="text-danger">{{ $errors->first('logo_scroll') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Address</label>
                <div class="col-md-9">
                    <input type="text" name="address" id="address" placeholder="Enter address" value="{{ $data['address'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Phone</label>
                <div class="col-md-9">
                    <input type="tel" name="phone" id="phone" placeholder="Enter phone" value="{{ $data['phone'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" placeholder="Enter email" value="{{ $data['email'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Facebook</label>
                <div class="col-md-9">
                    <input type="url" name="facebook" id="facebook" placeholder="Enter facebook" value="{{ $data['facebook'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Instagram</label>
                <div class="col-md-9">
                    <input type="url" name="instagram" id="instagram" placeholder="Enter instagram" value="{{ $data['instagram'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Twitter</label>
                <div class="col-md-9">
                    <input type="url" name="twitter" id="twitter" placeholder="Enter twitter" value="{{ $data['twitter'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Linkedin</label>
                <div class="col-md-9">
                    <input type="url" name="linkedin" id="linkedin" placeholder="Enter linkedin" value="{{ $data['linkedin'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Youtube</label>
                <div class="col-md-9">
                    <input type="url" name="youtube" id="youtube" placeholder="Enter youtube" value="{{ $data['youtube'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Footer text</label>
                <div class="col-md-9">
                    <input type="text" name="footer_text" id="footer_text" placeholder="Enter footer text" value="{{ $data['footer_text'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('footer_text') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Footer link</label>
                <div class="col-md-9">
                    <input type="url" name="footer_link" id="footer_link" placeholder="Enter footer link" value="{{ $data['footer_link'] }}" class="form-control">
                    <span class="text-danger">{{ $errors->first('footer_link') }}</span>
                </div>
            </div>

            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-footer">

        </div>
    </div>


@endsection
@push('footer-scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewer').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileEg1").change(function () {
        readURL(this);
    });
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewer2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileEg2").change(function () {
        readURL2(this);
    });
 </script>

@endpush
