
@extends('admin.main')
@section('content')
<div class="container-fluid">

        <iframe src="{{ route('unisharp.lfm.show') }}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
</div><!-- /.container-fluid -->
@endsection