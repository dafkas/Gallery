@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$gallery->name}}</div>

                <div class="panel-body">
                 <h4>Upload new image</h4>
                 {{ Form::open( array('action' => 'ImageController@upload', 'files' => true)) }}
                 <p>{{ Form::file('image')}}</p>
                 {{ Form::hidden('galleryId', $gallery->id) }}
                <button type="submit" class="hvr-sweep-to-right">
                    Save image
                </button>
                {{ Form::close() }}
                 <h4>Images :</h4>
                <div class="image-container">   
                    @foreach($galleryImages as $key => $image)
                        @if($key == 4)
                        <hr>
                            <p class="load-more"><i class="fa fa-refresh" aria-hidden="true"></i> <a href="#">Load more images</p></a>
                            <hr>
                            @break
                        @endif
                    <img src="{{$image}}" class="img-thumbnail flex-item" width="354" height="236">
                    @endforeach
                 </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
