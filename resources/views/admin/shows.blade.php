@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/admin/show/add') }}">
                    <button class="action__btn">Add Show</button>
                </a>

                <a href="{{ url('/admin/show/clear') }}">
                    <button class="action__btn">Clear Old Shows</button>
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
                            <th>Information</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($show as $showz)
                            <tr>
                                <td class="movie__title">
                                    {{ $showz->movie_name }}

                                    <p>
                                        On: 
                                        {{ $showz->date_time }}
                                        at:
                                        {{ $showz->theatre_name }} - Cinema: {{ $showz->cinema }} - Price: {{ $showz->price }} Rs
                                    </p>
                                </td>

                                <td>
                                    <a href="{{ url('/admin/show/edit/' . $showz->id) }}">
                                        <button class="actions__btn" >
                                            Edit
                                        </button>
                                    </a>

                                    <form action="{{ url('admin/show/delete') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $showz->id }}" name="id">
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