@extends('dashbord_layout')
@section('pageContent')
<form action = "{{route('addCategoryOnTable')}}" method="post">
    @csrf
<input type="text" name = "categroyname" placeholder = "اسم الفئة">
@error("categroyname")
<b>{{$message}}</b>

@enderror 

<input type="submit" name = "addCategory">

</form>
@endsection
