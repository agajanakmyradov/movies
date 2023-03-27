@extends('layouts.admin.app')

@section('section_head')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">
            Movies
        </h1>
      </div>
    </div>
</div>
@endsection

@section('content')

    <div class="m-2 p-3 border" style="max-width: 500px">
        <h3>Add movie</h3>

        <form action="{{route('movies.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="poster" class="label-control">Poster</label>
                <input type="hidden" name="poster" value="">
                <input class="form-control" type="file" name="poster">

                <div>@error('poster') {{$message}} @enderror</div>
            </div>
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

            <div class="mb-3">
                <label for="genres">Genres</label>
                <div>@error('genres') {{$message}} @enderror</div>
                @for ($i = 0; $i < count($genres); $i++)
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="{{$genres[$i]['id']}}"
                            name="genres[{{$i}}]"
                            @if (old('genres') and in_array($genres[$i]['id'], old('genres')))
                                checked
                            @endif
                        >
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$genres[$i]['name']}}
                        </label>
                    </div>
                @endfor
            </div>

            <div class="row justify-content-end">
                <a href="{{route('movies.index')}}" class="btn btn-danger">Cancel</a>
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
