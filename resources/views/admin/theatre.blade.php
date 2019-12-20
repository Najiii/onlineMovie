@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('/admin/theatre/add') }}">
                    <button class="action__btn">Add theatre</button>
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
                            {{-- <th class="theatre__id">ID</th> --}}
                            <th>Title</th>
                            <th rowspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($theatres as $theatre)
                            <tr>
                                {{-- <td class="theatre__id">
                                    {{ $theatre->id }}
                                </td> --}}

                                <td class="theatre__title">
                                    {{ $theatre->theatre_name }}
                                </td>

                                <td>
                                    <a href="{{ url('/admin/theatre/edit/' . $theatre->id) }}">
                                        <button class="actions__btn">
                                            Edit
                                        </button>
                                    </a>

                                    <form action="{{ url('admin/theatre/delete') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $theatre->id }}" name="id">
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