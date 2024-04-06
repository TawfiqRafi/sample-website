@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Contact Message List</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @if($data->isNotEmpty())
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                            <td>{{ $item->message }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No data found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $data->links() }}
        </div>
    </div>

@endsection
