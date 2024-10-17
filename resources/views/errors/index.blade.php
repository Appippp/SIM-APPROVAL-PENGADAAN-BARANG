@extends('layouts.master')

@section('title', 'Errors')

@section('content')
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i> Mohon Maaf</h1>
        <p>{{ $exception }}</p>
        <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
    </div>
@endsection
