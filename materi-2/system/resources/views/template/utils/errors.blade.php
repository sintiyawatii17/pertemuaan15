@if($errors->has('nama'))
@foreach($errors->get($item) as $msg)
<label for="" class="label text-danger">{{$msg}}</label>
@endforeach
@endif