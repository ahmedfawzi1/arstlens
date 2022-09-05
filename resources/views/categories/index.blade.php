@extends('layouts.app')

@section('content')
    @foreach ($all_categories as $item)
        <a class="dropdown-item"> {{ $item->name }}
        </a>
    @endforeach
@endsection
