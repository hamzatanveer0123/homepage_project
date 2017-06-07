@extends('layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        <div class="panel panel-default custom-panel-default">
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
    <div class="panel panel-default custom-panel-default">
        <div class="panel-heading custom-panel-heading">
            <h3>My Notes</h3>
        </div>

        <div class="panel-body grid">
            <div class="grid-sizer"></div>
            @foreach ($notes as $index => $note)
                <div class="sticky grid-item" style="cursor: pointer" data-toggle="modal" data-target="#myNotes">
                    {{ $note->body }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- form to add a new card --}}
    <form action="{{ url('notes') }}/{{ Auth::user()->id  }}"  method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="body" value="add text here...">
            <button type="submit" class="btn btn-success add-new-notes">
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
            </button>
        </div>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Site</button>
        </div>
    </form>
@stop

@section('model-notes')
    @foreach ($notes as $index => $note)
        <div class="modal fade" id="myNotes" tabindex="-1" role="dialog" aria-labelledby="addCard" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Add New Card</h3>
                    </div>
                    <div class="modal-body">
                        <textarea name="body" class="form-control notes" data-uid="{{ Auth::user()->id }}" data-id="{{$note->id}}">{{$note->body}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop