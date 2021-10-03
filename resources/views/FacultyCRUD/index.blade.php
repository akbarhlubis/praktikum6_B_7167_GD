@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Faculty CRUD</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{route('faculties.create')}}">Create a New Faculty</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Faculty</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @if (count($faculties))
        @foreach ($faculties as $faculty)
            <tr>
                <td class="text-center">{{$faculty->id}}</td>
                <td>{{$faculty->nama_fakultas}}</td>
                <td class="text-center">
                    <form action="{{route('faculties.destroy',$faculty->id)}}" method="post">
                        <a href="{{route('faculties.show',$faculty->id)}}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{route('faculties.edit',$faculty->id)}}" class="btn btn-info btn-sm">Edit</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin mau menghapus data ini?')">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td align="center" colspan="3">Datanya Kosong..., Have a Nice Day</td>
        </tr>
        @endif
    </table>
@endsection