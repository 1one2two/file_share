@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @error('url')
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

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                <a href="{{ Session::get('url') }}">{{ Session::get('url') }}</a>
            </div>
            @endif
            <br>
            <div class="card">
                <div class="card-header">Download file</div>

                <div class="card-body">
                    <form action="{{ action('filecontroller@download') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file">URL:</label>
                            @if($url !== null)
                            <input type="text" class="form-control" value="{{ $url }}" name="url" id="url" aria-describedby="fileHelp" placeholder="Enter url">
                            @else
                            <input type="text" class="form-control" value="" name="url" id="url" aria-describedby="fileHelp" placeholder="Enter url">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="pasword" id="pasword" aria-describedby="paswordHelp" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @if ($message = Session::get('download'))
                    <div class="alert alert-success alert-block" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                        <a href="{{ Session::get('url') }}">{{ Session::get('url') }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection