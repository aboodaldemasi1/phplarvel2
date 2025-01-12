@extends('dashbord_layout')
@section('pageContent')
<form action = "{{ route('updateCategory', $category->id) }}" method="post">
    @csrf
    @method("put")
<input type="text" name = "categroyname" placeholder = "اسم الفئة" value="{{ $category->name}}">
@error("categroyname")
<b>{{$message}}</b>

@enderror 

<input type="submit" name = "addCategory">

</form>
@endsection
