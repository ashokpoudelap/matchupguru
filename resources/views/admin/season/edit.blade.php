@extends('layouts.app')
@section('title')
    Edit Season
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                <a href="{{route("season.index")}}" class="btn btn-primary pull-left">Go back</a>
                <h4 style="color:black; " class="text-center">Add Season</h4>

            </div>
            <div class="col-sm-10 col-sm-offset-2">
                <form method="post" enctype="multipart/form-data" action="{{route("season.update",$season->id)}}">
                    {{csrf_field()}}
                    {{method_field("PUT")}}

                    <div class="form-group{{ $errors->has('game') ? ' has-error' : '' }}">
                        <label for="game" class=" control-label">Game * </label>

                        <select name="game" class="form-control">
                            @foreach($games as $game)
                                <option value="{{$game->id}}" {!! $season->game_id==$game->id?'selected':'' !!}>{{$game->name}}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('game'))
                            <span class="help-block">
                          <strong>{{ $errors->first('game') }}</strong>
                      </span>
                        @endif

                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class=" control-label">Name * </label>

                        <input id="title" type="text" class="form-control" name="title" value="{{ $season->name     }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                        @endif

                    </div>
                    <div class="form-group{{ $errors->has('default') ? ' has-error' : '' }}">
                        <label for="default" class=" control-label">Default Season </label>

                        <input type="checkbox" {!! $season->is_current?'checked':'' !!} name="default">
                    </div>



                    <input type="submit" value="Update Season" class="btn btn-primary">

                </form>

            </div>
        </div>
    </div>


@endsection

@section('script')

@endsection
