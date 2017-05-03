@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$gallery->name}}</div>

                <div class="panel-body">
                 <h4>Images :</h4>
                 <img src="https://placehold.it/100">
                 <img src="https://placehold.it/100">
                 <img src="https://placehold.it/100">
                 <h4>Upload new image</h4>
                 {{ Form::open( array('action' => 'ImageController@upload', 'files' => true)) }}
                 <p>{{ Form::file('image')}}</p>
                 {{ Form::hidden('galleryId', $gallery->id) }}
                <p>{{ Form::submit('Upload image', array('class' => 'btn btn-success btn-sm'))}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
