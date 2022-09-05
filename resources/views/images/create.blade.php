@extends('layouts.navbar')

@section('content')

    @if ($errors->any())
        <div class="container col-8">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (Session::has('done'))
        <div class="container col-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('done') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <h1 class="text-center text-info display-2"> Create Posts </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="container col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="action={{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> Add your Image name</label>
                        <input class="form-control" type="text" name="image_name">

                    </div>
                    <div class="form-group">
                        <label> Add your Image Description </label>
                        <input class="form-control " type="text" name="image_discription">

                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="category_id">
                            <option selected>Choose your category</option>
                            @foreach ( $all_categories as $item )
                            <option value=" {{ $item->id }} ">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Upload your Image </label>
                        <input class="form-control btn btn-info py-1" style="border: solid black 1px" type="file"
                            name="image">
                    </div>
                    <button class="btn btn-info"> Save </button>
                </form>
            </div>
        </div>
    </div>

@endsection
