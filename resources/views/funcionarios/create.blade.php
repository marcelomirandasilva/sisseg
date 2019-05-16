@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>{{$titulo}}</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">

			@if( isset($funcionario))
			   <form id="frm_funcionario" method="post" action="{{url("funcionarios/$funcionario->id")}}">
   				{!! method_field('PUT') !!}
		   @else
				<form id="frm_funcionario" method="POST" action="{{url("funcionarios")}}" >
			@endif

				@csrf

					<div class="form-group row">
						<label for="nome" class="col-md-2 col-form-label text-md-right">Nome</label>
						<div class="col-md-7">
							<input id="nome" type="text" class="form-control" name="nome" value="{{$funcionario->nome or old('nome')}}" required autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
						<div class="col-md-7">
							<input id="email" type="email" class="form-control" name="email" value="{{$funcionario->email or old('email')}}">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label text-md-right" for="cpf">CPF</label>
						<div class="col-md-7">
							<input type="cpf" id="cpf" class="form-control" name="cpf" value="{{$funcionario->cpf or old('cpf')}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="secretaria" class="col-md-2 col-form-label text-md-right">Secretaria</label>
						<div class="col-md-7">
							<select id="secretaria" class="form-control" name="secretaria_id" required>
								<option value="">Selecione uma Secretaria...</option>
								@if (isset($funcionario))
									@foreach($secretarias as $secretaria)
										@if ( $funcionario->secretaria == $secretaria)
											<option value="{{$secretaria->id}}" selected="selected"> {{$secretaria->nome}} </option>
										@else
											<option value="{{$secretaria->id}}" > {{$secretaria->nome}} </option>
										@endif
									@endforeach
								@else
									@foreach($secretarias as $secretaria)
										<option value="{{$secretaria->id}}"> {{$secretaria->nome}} </option>
									@endforeach
								@endif
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="tipo" class="col-md-2 col-form-label text-md-right">Tipo</label>
						<div class="col-md-7">
							<select id="tipo" class="form-control" name="tipo" required>
								<option value="">Selecione um Tipo...</option>
								@if (isset($funcionario))
									@foreach($tipos as $tipo)
										@if ( $funcionario->tipo == $tipo)
											<option value="{{$tipo}}" selected="selected"> {{$tipo}} </option>
										@else
											<option value="{{$tipo}}" > {{$tipo}} </option>
										@endif
									@endforeach
								@else
									@foreach($tipos as $tipo)
										<option value="{{$tipo}}"> {{$tipo}} </option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-md-2 col-form-label text-md-right" for="motorista">Motorista</label>
						<div class="col-md-1">
							@if (isset($funcionario))
								<input class="form-control" id="motorista" type="checkbox" name="motorista" onchange="habilitar_motorista()" 
									@if($funcionario->motorista) checked @endif
								/>
							@else
								<input class="form-control" id="motorista" type="checkbox" name="motorista" onchange="habilitar_motorista()"/>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6">
							<label class="col-md-2 col-form-label " for="celular">Celular</label>
							<div class="col-md-7">
								<input type="celular" id="celular" class="form-control" name="celular"
									value="{{$funcionario->celular or old('celular')}}" 
									@if(!$funcionario->motorista) disabled @endif 
								/>
							</div>
						</div>
		
						<div class="col-md-6">
							<label class="col-md-2 col-form-label " for="cnh">CNH</label>
							<div class="col-md-7">
								<input type="cnh" id="cnh" class="form-control" name="cnh" 
									value="{{$funcionario->cnh or old('cnh')}}" 
									@if(!$funcionario->motorista) disabled @endif 
								/>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label class="col-md-2 col-form-label text-md-right" for="categoria_cnh">Categoria</label>
							<div class="col-md-7">
								<input type="categoria_cnh" id="categoria_cnh" class="form-control" name="categoria_cnh" 
									value="{{$funcionario->categoria_cnh or old('categoria_cnh')}}" 
									@if(!$funcionario->motorista) disabled @endif 
								/>
							</div>
						</div>
		
						<div class="form-group col-md-6">
							<label class="col-md-2 col-form-label text-md-right" for="validade_cnh">Validade</label>
							<div class="col-md-7">
								@if(isset($funcionario))
									<input type="date" id="validade_cnh" class="form-control" name="validade_cnh" 
										@if($funcionario->motorista) 
											value="{{$funcionario->validade_cnh or old('validade_cnh')}}" 
										@endif
									/>
								@else
									<input type="validade_cnh" id="validade_cnh" class="form-control" name="validade_cnh" 
										value="{{date("d-m-Y", strtotime($funcionario->validade_cnh)) or old('validade_cnh') }}" 
										disabled 
									/>
								@endif
							</div>
						</div>
					</div>
				

					 {{-- BOTÕES --}}
					 <div class="ln_solid"> </div>
					 <div class="footer text-center"> {{-- col-md-3 col-md-offset-9 --}}
						 <button id="btn_cancelar" class="botoes-acao btn  btn-primary" >
							 <span class="icone-botoes-acao mdi mdi-backburger"></span>   
							 <span class="texto-botoes-acao"> CANCELAR </span>
							 <div class="ripple-container"></div>
						 </button>
					 
						 <button type="submit" id="btn_salvar" class="botoes-acao btn  btn-success ">
							 <span class="icone-botoes-acao mdi mdi-send"></span>
							 <span class="texto-botoes-acao"> SALVAR </span>
							 <div class="ripple-container"></div>
						 </button>
					 </div>
			</form>

		</div>

	</div>

@endsection

@push('scripts')

	{{-- Vanilla Masker --}}
	<script src="{{asset('js/vanillaMasker.min.js')}}"></script>

	<script>

		VMasker ($("#validade_cnh")).maskPattern("99/99/9999");
		VMasker ($("#categoria_cnh")).maskPattern("AA");
		VMasker ($("#cnh")).maskPattern("99.999.999.999");
		VMasker ($("#celular")).maskPattern("99999-9999"); 
		VMasker ($("#cpf")).maskPattern("999.999.999-99");

		//Habilitar MOTORISTA
   	function habilitar_motorista(){
        if(document.getElementById('motorista').checked){
            document.getElementById('celular').removeAttribute("disabled");
            document.getElementById('cnh').removeAttribute("disabled");
            document.getElementById('categoria_cnh').removeAttribute("disabled");
            document.getElementById('validade_cnh').removeAttribute("disabled");
        }
        else {
            document.getElementById('celular').setAttribute("disabled", "disabled");
            document.getElementById('cnh').setAttribute("disabled", "disabled");
            document.getElementById('categoria_cnh').setAttribute("disabled", "disabled");
            document.getElementById('validade_cnh').setAttribute("disabled", "disabled");
        }
    	}

		$(function(){
			
			if(document.getElementById('motorista').checked){
            document.getElementById('celular').removeAttribute("disabled");
            document.getElementById('cnh').removeAttribute("disabled");
            document.getElementById('categoria_cnh').removeAttribute("disabled");
            document.getElementById('validade_cnh').removeAttribute("disabled");
        }else {
            document.getElementById('celular').setAttribute("disabled", "disabled");
            document.getElementById('cnh').setAttribute("disabled", "disabled");
            document.getElementById('categoria_cnh').setAttribute("disabled", "disabled");
            document.getElementById('validade_cnh').setAttribute("disabled", "disabled");
        }

			//botão de cancelar
			$("#btn_cancelar").click(function(){
				event.preventDefault();
				window.history.back();
			});
				
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


		});

		

	</script>

@endpush



