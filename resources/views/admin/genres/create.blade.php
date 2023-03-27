@extends('layouts.admin.app')

@section('section_head')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">
            Genres
        </h1>
      </div>
    </div>
</div>
@endsection

@section('content')
    <div class="m-2 p-3 border" style="max-width: 500px">
        <h3>Add genre</h3>

        <form action="{{route('genres.store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label class="label-control" for="name">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="name"
                    @if (old('name'))
                        value="{{old('name')}}"
                    @endif
                />
                <div class="d-flex justify-content-between">
                    <div>@error('name') {{$message}} @enderror</div>
                    <div class="text-muted">
                        <span id="length">0</span>/255
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <a href="{{route('genres.index')}}" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-success mx-2" value="Save">
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var text = $('#name').val();
            $('#length').text(text.length);

            $('#name').on ('input', function() {
                var text = $('#name').val();
                $('#length').text(text.length);
            })
        })
    </script>
@endpush
