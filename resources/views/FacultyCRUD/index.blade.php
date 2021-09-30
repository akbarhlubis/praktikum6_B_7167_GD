@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Faculty CRUD</h2>
        </div>
        <div>
            <a href="{{route('faculties.create')}}" class="btn btn-succes">Create a New Faculty</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-succes">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="table table-bordered">
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </div>
@endsection