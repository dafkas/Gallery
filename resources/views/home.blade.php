@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                 <h3>Galleries</h3>
                @foreach($galleries as $gallery)
                    <p><a href="showGallery/{{$gallery->id}}">{{$gallery->name}}</a></p>
                @endforeach
                {{ Form::open(['action' => 'GalleryController@store']) }}
                  {{ Form::text('name') }}
                  {{ Form::submit('Create new gallery', array('class' => 'btn btn-default'))}}
                {{ Form::close() }}

               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
