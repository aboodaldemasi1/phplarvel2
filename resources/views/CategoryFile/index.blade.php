@extends("dashbord_layout")
@section("pageContent")
@if(Session("inserttrue"))
<b>{{Session("inserttrue")}}</b>
@endif

<table width = "100%" border="1px">
<tr>

<td>id</td>
<td>user id </td>
<td>name</td>
<td>Operasions</td>
</tr>
@foreach ($data as $item)
<tr>
<td>{{$item->id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->name}}</td>
<td>
<form action="{{route('deleteCategroy',$item->id)}}" method = "post">
@csrf
@method("DELETE")
<input type="submit" value ="حذف">

</form>
 <a href="{{route('editPageUi',$item->id)}}">Edit</a>
</td>

</tr> 
@endforeach
</table>
@endsection