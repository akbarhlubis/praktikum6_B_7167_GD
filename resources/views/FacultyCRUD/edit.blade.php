@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Edit Faculty</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{route('faculties.index')}}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Uppps!</strong>There were some problem with your Inputan. <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{error}}</li>
                @endforeach
            </ul>
        </div>  
    @endif

    <form action="{{route('faculties.update',$faculties->id)}}" method="post">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Faculty Name:</strong>
                <input type="text" class="form-control" name="nama_fakultas" placeholder="Faculty Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    
</form>
@endsection