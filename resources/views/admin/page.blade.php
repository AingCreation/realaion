@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Page : {{$page->page_name}}</h1>
            </div>
            <div class="col-md-12">
                {!! Form::open() !!}

                <h2>Français :</h2>
                <div class="form-group">
                    {!! Form::textarea('fr', $page->fr, ['class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                </div>

                <h2>Anglais :</h2>
                <div class="form-group">
                    {!! Form::textarea('en', $page->en, ['class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                </div>

                <input type="submit" class="btn btn-primary" value="Edit the page">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
