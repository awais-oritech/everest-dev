@extends('layouts.site')
@section('content')
Pages
@foreach($pages as $page)
{{$page->name}}
@endforeach
@endsection
