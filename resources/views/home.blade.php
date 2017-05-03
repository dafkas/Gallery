@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body" style="margin-top: 0px;">
                 <h3>Galleries</h3>
                <table>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td><a href="showGallery/{{$gallery->id}}">{{$gallery->name}}</a></td>
                            <td class="delete"><a href="delete/{{$gallery->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                </table><p></p>
                {{ Form::open(['action' => 'GalleryController@store']) }}
                  {{ Form::text('name') }}
                  <p><button type="submit" class="hvr-sweep-to-right" style="margin-left:0px;">
                    Save
                  </button></p>
                {{ Form::close() }}

               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
