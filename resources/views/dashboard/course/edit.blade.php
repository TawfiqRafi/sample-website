@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Update Course</h5>
            <a href="{{ route('course.list') }}" class="btn btn-sm btn-secondary float-right">Course List</a>
        </div>
        {!! Form::open(['route' => ['course.update', $course->slug], 'method' => 'PUT']) !!}
        <div class="box-body">
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label"></label>
                <div class="col-md-9">
                    <center>
                        <img style="width: 20%;border: 1px solid; border-radius: 10px;" id="viewer"
                        src="{{asset($course['image'])}}" onerror="this.src='{{ asset('assets/frontend/img/img2.jpg')}}'" alt="course image" />
                    </center>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Image</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <label class="custom-file-label" for="customFileEg1">Choose Image</label>
                    </div>
                    {{-- <input type="file" name="image" id="" placeholder="Enter image" class="form-control"> --}}
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Title</label>
                <div class="col-md-9">
                    <input type="text" name="title" id="title" placeholder="Enter title" class="form-control" value="{{ $course['title'] }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Short Description</label>
                <div class="col-md-9">
                    <textarea type="text" name="short_description" id="" placeholder="Enter short description"
                        class="form-control">{{ $course['short_description'] }}</textarea>
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-9">
                    <textarea type="text" name="description" id="" placeholder="Enter description"
                        class="form-control ckeditor">{!! $course['description'] !!}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div>
            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Update</button>
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
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#viewer').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function() {
            readURL(this);
        });
    </script>
@endpush
