@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>Cadastro de Funcionarios</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">

			<form method="POST" action="{{ url("funcionarios") }}" aria-label="{{ ('Register') }}">
					@csrf

					<div class="form-group row">
						<label for="Nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

						<div class="col-md-7">
							<input id="Nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>

							@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

						<div class="col-md-7">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
	      				<label class="col-md-2 col-form-label text-md-right" for="cpf">CPF</label>
	         				<div class="col-md-7">
	         					<input type="cpf" id="cpf" class="form-control" name="cpf">
	         				</div>
      		  		</div>

					<div class="form-group row">
						<label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Senha') }}</label>

						<div class="col-md-7">
							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

							@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

						<div class="col-md-7">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="secretaria" class="col-md-2 col-form-label text-md-right">{{ __('Secretaria') }}</label>

						<div class="col-md-7">
							<select id="secretaria" class="form-control{{ $errors->has('secretaria') ? ' is-invalid' : '' }}" name="secretaria_id" required autofocus>
									<option value="">Selecione uma Secretaria...</option>
										
									@foreach($secretarias as $secretaria)

										<option value="{{$secretaria->id}}">{{$secretaria->nome}}</option>

									@endforeach

							</select>

							@if ($errors->has('secretaria'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('secretaria') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="setor" class="col-md-2 col-form-label text-md-right">{{ __('Setor') }}</label>

						<div class="col-md-7">
							<select id="setor" class="form-control{{ $errors->has('setor') ? ' is-invalid' : '' }}" name="setor_id" autofocus>
									
									<option value="">Selecione um Setor...</option>

							</select>

							@if ($errors->has('setor'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('setor') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="cargo" class="col-md-2 col-form-label text-md-right">{{ __('Cargo') }}</label>

						<div class="col-md-7">
							<select id="cargo" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo_id"required autofocus>

									<option value="">Selecione um Cargo...</option>
								
							</select>

							@if ($errors->has('cargo'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('cargo') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="tipo" class="col-md-2 col-form-label text-md-right">{{ __('Tipo') }}</label>

						<div class="col-md-7">
							<select id="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" required autofocus>
									<option value="">Selecione um Tipo...</option>
										
									@foreach($tipos as $tipo)

										<option value="{{$tipo}}">{{$tipo}}</option>

									@endforeach

							</select>

							@if ($errors->has('tipo'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('tipo') }}</strong>
									</span>
							@endif
						</div>
					</div>
					
					{{-- <div class="form-group row">
						<label for="sistema" class="col-md-2 col-form-label text-md-right">{{ __('Sistemas') }}</label>

						<div class="col-md-3 div-select">
							<select id="sistema" class=" select2_group form-control{{ $errors->has('sistema') ? ' is-invalid' : '' }}" name="sistema" required autofocus>>
										
									<option value="">Selecione um Sistema...</option>

									@foreach($sistemas as $sistema)

										<option value="{{$sistema->id}}">{{$sistema->nome}}</option>

									@endforeach

							</select>

							@if ($errors->has('sistema'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('sistema') }}</strong>
									</span>
							@endif
						</div>

						<label for="role" class="col-md-1 col-form-label text-md-right">{{ __('Role') }}</label>

						<div class="col-md-3 div-select">
							<select id="role" class="select2_group form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="sistema" required autofocus>>
										
									<option value="">Selecione uma Role...</option>

									{{-- @foreach($roles as $role)

										<option value="{{$role->id}}">{{$role->nome}}</option>

									@endforeach

							</select>

							@if ($errors->has('role'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('role') }}</strong>
									</span>
							@endif
						</div>

						<div class="col-md-3">
						<a href="#" class="btn btn-info btn-nova-linha btn-cor-padrao"> <i class="fa fa-plus"></i> </a>
						</div>

					</div>
--}} 


					<div class="form-group row mb-0">
						<div class="col-md-5 offset-md-4" style="margin-left: 174px;">
							<button type="submit" class="btn btn-primary">
									{{ __('Cadastrar') }}
							</button>
						</div>
					</div>
			</form>

		</div>

	</div>

@endsection

@push('scripts')

	{{-- Vanilla Masker --}}
	<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>

	<script>

		$(function(){

				// Fazer a chamada no evento CHANGE do select de secretarias

				$("select#secretaria").change(function(){
					
					// Guardar o id da secretaria em uma variável
					let secretaria_id = $(this).val();

					// Fazer a chamada para a API usando o valor do ID
					$.get("/api/setoresporsecretaria/" + secretaria_id, function(resultados){

						// Deletar todas as options
						$("select#setor").empty();

						// Adicionar a opção "Selecione..."
						$("select#setor").append(`<option value=''>Selecione um Setor...</option>`); 
						
						// Iterar por todos os resultados e chamar a função passando o índice e o valor
						$.each(resultados, function(indice, valor){
								
								// Selectionar o Select de Setores e adicionar um option para cada valor
								$("select#setor").append(`<option value='${valor.id}'>${valor.nome}</option>`); 

						});

					});

						$.get("/api/cargosporsecretaria/" + secretaria_id, function(resultados){
						
						// Deletar todas as options
						$("select#cargo").empty();

						// Adicionar a opção "Selecione..."
						$("select#cargo").append(`<option value=''>Selecione um Cargo...</option>`); 
						
						// Iterar por todos os resultados e chamar a função passando o índice e o valor
						$.each(resultados, function(indice, valor){
								
								// Selectionar o Select de cargos e adicionar um option para cada valor
								$("select#cargo").append(`<option value='${valor.id}'>${valor.nome}</option>`); 

						});

					});

				});      

				VMasker ($("#cpf")).maskPattern("999.999.999-99");
		});

		

	</script>

@endpush