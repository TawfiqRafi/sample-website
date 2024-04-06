@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Service List</h3>
            <a href="{{ route('service.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($services->isNotEmpty())
                    @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $service->title }}</td>
                            <td>
                                @if($service->image)
                                <img src="{{ asset($service->image) }}" alt="" width="40px">
                                @endif
                            </td>
                            <td>{{ $service->short_description }}</td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('service.edit', $service->slug) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['service.destroy', $service->slug], 'method' => 'DELETE', 'class'=>'action-el']) !!}
                                    <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSubmit(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No service found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>

@endsection
