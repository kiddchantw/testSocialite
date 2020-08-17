@extends('layouts.app2')

@section('content')


<div class="container">
    <div class="row col-sm-9 jumbotron">
    
    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" />
        <br>
        <input type="submit" name="Upload" />
    </form>
      
    </div>
</div>

</div>

@endsection