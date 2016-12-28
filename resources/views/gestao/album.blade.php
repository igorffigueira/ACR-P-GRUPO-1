@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')
@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif


<div class="row">
	<div class="col-md-6">
		<form class="" method="POST" action="{{ action('GestaoController@adicionaAlbum')}}" enctype="multipart/form-data">

		<div class="form-group">
		<label>Nome: </label><br>
		<input type="text" name="nome" class="form-control">

		@if ($errors->has('nome'))
        <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
        </span>
        @endif


		</div>

		<div class="form-group">
		<label>Data de Lançamento: </label><br>
		<input type="date" name="data_lancamento" class="form-control" >

		@if ($errors->has('data_lancamento'))
        <span class="help-block">
        <strong>{{ $errors->first('data_lancamento') }}</strong>
        </span>
        @endif

		</div>


		<div class="form-group">
		<label>Imagem do album: </label>
		<input type="file" name="file" id ="file" class="form-control" >

		@if ($errors->has('file'))
        <span class="help-block">
        <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-success">Adicionar</button>
		
		</form>
		<br>
	</div>
</div>


@endsection