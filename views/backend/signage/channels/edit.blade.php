@extends('adminlte::page')

@section('title', 'Channel bearbeiten')

@section('content_header')
    <h1>Channel bearbeiten</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        {!! Form::model($channel, [
            'method' => 'patch',
            'route' => ['channels.update', $channel->id]
        ]) !!}
        <div class="panel panel-default panel--device panel--device-edit">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        {{ Form::vspotText('name', 'Bezeichnung') }}
                    </div>
                    <div class="col-md-8 col-lg-9">
                        {{ Form::vspotText('description', 'Beschreibung') }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::vspotText('display_time', 'Anzeigedauer (ms)') }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::vspotText('transition_time', 'Überblendung (ms)') }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::vspotText('refresh_time', 'Refresh (s)') }}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('effects') ? ' has-error' : '' }}">
                            <label for="channel-effect-select">Übergangseffekt</label>
                            {{ Form::select('effect', ['slide'=>'Slide', 'fade'=>'Fade', 'cube'=>'Cube', 'coverflow'=>'Cover Flow', 'flip'=>'Flip'], $channel->effect, [
                                'id' => 'channel-effect-select',
                                'style' => 'visibility: hidden;',
                                'class' => 'js-enhanced-select',
                            ]) }}
                            @if($errors->has('effects'))
                                <span class="help-block"><strong>{{ $errors->first('effects') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        {{ Form::vspotCheckbox('uses_parallax', 'Parallaxen in der Animation verwenden') }}
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                {{ Form::vspotBack() }}
                {{ Form::vspotSubmit('Channel aktualisieren') }}
            </div>
        </div> <!-- /.panel -->
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
<script>
    jQuery(document).ready(function($) {
        $('#channel-effect-select').select2({
            width: '100%',
            minimumResultsForSearch: 'Infinity'
        });
    });
</script>
@endsection
