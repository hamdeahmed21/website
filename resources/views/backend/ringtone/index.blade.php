@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Ringtones
                        <span class="float-right">
                        <a href="{{route('ringtones.create')}}">
                            <button class="btn btn-primary">Create Ringtone</button>
                        </a>
                    </span>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>

                                <th scope="col">File</th>
                                <th scope="col">Category</th>
                                <th scope="col">Download</th>
                                <th scope="col">Size</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                                @foreach($ringtones as $ringtone)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$ringtone->title}}</td>
                                        <td>{{$ringtone->description}}</td>

                                        <td>
                                            <audio controls onplay ="pauseOthers(this);" >
                                                <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                                                Your browser does not support this element
                                            </audio>
                                        </td>
                                        <td>{{$ringtone->category->name}}</td>
                                        <td>{{$ringtone->download}}</td>
                                        <td>{{$ringtone->size}}bytes</td>
                                        <td>
                                            <a href="{{route('ringtones.edit',[$ringtone->id])}}">
                                                <button class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="{{route('ringtones.destroy',[$ringtone->id])}}">
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

