@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @error('file')
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            @error('pasword')
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                <a href="{{ Session::get('url') }}">{{ Session::get('url') }}</a>
            </div>
            @endif
            <br>
            <div class="card">
                <div class="card-header">Upload file</div>

                <div class="card-body">
                    <form action="{{ action('filecontroller@update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control" name="file" id="file" aria-describedby="fileHelp" placeholder="Select file">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="pasword" id="pasword" aria-describedby="paswordHelp" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection