@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">All Photo
                        <span class="float-right">
                        <a href="{{route('photos.create')}}">
                            <button class="btn btn-primary">Create Photo</button>
                        </a>
                    </span>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">File</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>

                                <th scope="col">Format</th>
                                <th scope="col">Size</th>


                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                                @foreach($photos as $photo)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>
                                            <img src="/uploads/{{$photo->file}}" width="100">
                                        </td>
                                        <td>{{$photo->title}}</td>
                                        <td>{{$photo->description}}</td>



                                        <td>{{$photo->format}}</td>
                                        <td>{{round($photo->size)*0.001,2}}kb</td>
                                        <td>
                                            <a href="{{route('photos.edit',[$photo->id])}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                            <a href="{{route('photos.destroy',[$photo->id])}}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

