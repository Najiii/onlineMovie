@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/admin/movie/add') }}">
                    <button class="action__btn">Add Movie</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th class="movie__id">ID</th> --}}
                            <th rowspan="2">Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td class="movie__title">
                                    <a href="{{ url('movie/' . $movie->id) }}">
                                        {{ $movie->title }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ url('/admin/movie/edit/' . $movie->id) }}">
                                        <button class="actions__btn" >
                                            Edit
                                        </button>
                                    </a>

                                    <form action="{{ url('admin/movie/delete') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $movie->id }}" name="id">
                                        <button type="submit" class="actions__btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection