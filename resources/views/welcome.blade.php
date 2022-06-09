@extends('layout')

@section('content')
@if(session('stored'))
    <div class="alert alert-success" role="alert">
        Link stored<br>
        {{ session('stored') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('form') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" id="link" aria-describedby="link" value="{{ old('link') }}">
    </div>
    <div class="mb-3">
        <label for="redirects_max" class="form-label">Redirects max</label>
        <input type="text" name="redirects_max" class="form-control" id="redirects_max" value="{{ old('redirects_max', 0) }}">
    </div>
    <div class="mb-3">
        <label for="hours_max" class="form-label">Hours max</label>
        <input type="text" name="hours_max" class="form-control" id="hours_max" value="{{ old('hours_max', 1) }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
