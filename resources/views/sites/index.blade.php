@extends('layouts.app')

@section('header')
    <link href="http://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <script src="{{ elixir('js/functions.js') }}"></script>
@stop

@section('content')
    <div class="panel-body">
        <button type="button" class="btn btn-danger add-new-card" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <!-- Current Sites -->
    @if (count($sites) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Bookmarks</h4>
            </div>

            <div class="panel-body">
                @foreach ($sites as $site)
                    <div class="col-md-3 col-sm-4 col-xs-4 card" style="text-align: center;">
                        <a class="site-url" href="{{ $site->url }}" title="{{ $site->name  }}">
                            <img class="site-image" src="{{ $site->image }}">
                        </a>
                        <form action="{{ url($site->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-default invisible-button">
                                <i class="fa fa-times"></i>
                            </button>
                            <button type="submit" class="btn btn-default delete-button">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    <!-- Current notes -->
    @if (count($notes) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Notes</h4>
            </div>

            <div class="panel-body">
                @foreach ($notes as $note)
                    <textarea class="sticky">{{$note->body}}</textarea>
                @endforeach
            </div>
        </div>
    @endif

    <form action="{{ url('notes') }}/{{ Auth::user()->id  }}"  method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <textarea name="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>

@stop

@section('model-content')

    <!-- New Site Form -->
    <form action="{{ url('sites') }}/{{ Auth::user()->id  }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Site Name -->
        <div class="form-group">
            <div class="col-sm-12">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name of the website"><br/>
                <input type="text" name="url" id="url" class="form-control" placeholder="Url of the website"><br/>
                <input type="text" name="image" id="image" class="form-control" placeholder="Image url of the website"><br/>
            </div>
        </div>
        <!-- Add Site Button -->
        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Site
                </button>
            </div>
        </div>
    </form>

@stop