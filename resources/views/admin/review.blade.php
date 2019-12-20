@extends('admin.index')

@section('adminContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2">Title</th>
                        <th>By User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="review__title">
                                {{ $review->title }}
                                <p>
                                    {{ $review->review }}
                                </p>
                            </td>

                            <td>
                                {{ $review->user_name }}
                            </td>

                            <td>
                                <form action="{{ url('admin/review/approve') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $review->id }}" name="id">
                                    <button type="submit" class="actions__btn">Approve</button>
                                </form>

                                <form action="{{ url('admin/review/discard') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $review->id }}" name="id">
                                    <button type="submit" class="actions__btn">Discard</button>
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