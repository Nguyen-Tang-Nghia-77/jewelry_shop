@extends('errors.admin.layouts')
@section('content')
<div class="container-fluid text-center">
    <div class="text-center">
        <img src="{{ asset('/images/errors/404.jpg') }}"  style="width: 80%; height: 500px;" class=" mt-5" alt="error">
    </div>
    <h3 class="text-center text-danger">Sorry, This page does not exist.</h3>
    <button type="button" class="btn btn-primary"><a class="text-light" href="{{ route('dashboard') }}">Go to hompage</a></button>
    
</div><!-- /.container-fluid -->
@endsection
    

