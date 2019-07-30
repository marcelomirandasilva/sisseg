@extends('principal') 
@section('conteudo') <div class="x_panel">
	<div class="x_title">
		<h2>Role</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		@if( isset($role))
			<form id="frm_role" method="POST" action="{{url("roles/$role->id") }}">
			{!! method_field('PUT') !!}
		@else
			<form id="frm_role" method="POST" action="{{url("roles")}}"> 
		@endif

			@csrf 
			<div class="form-group row">
				<label for="nome" class="col-md-2 col-form-label text-md-right">Sistema</label>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<select name = "sistema_id" id="sistema_id" class="form-control selectpicker error">
					
						<option value=""> Selecione... </option>

						@if (isset($role))
							@foreach($sistemas as $sistema)
								@if ( $role->sistema_id == $sistema->id)
									<option value="{{ $sistema->id }}" selected="selected"> {{ $sistema->nome }} </option>
								@else
									<option value="{{ $sistema->id }}"> {{ $sistema->nome }} </option>
								@endif
							@endforeach
						@else
							@foreach($sistemas as $sistema)
									<option value="{{ $sistema->id }}"> {{ $sistema->nome }} </option>
							@endforeach
						@endif
					</select>	
				</div>
			</div> 
			
			<div class="form-group row">
				<label for="nome" class="col-md-2 col-form-label text-md-right">Nome da Role</label>
				<div class="col-md-6">
					<input id="nome" type="text" class="form-control" name="nome" value="{{$role->nome or old('nome') }}" required > 
				</div>
			</div>


			<div class="footer text-center"> {{-- col-md-3 col-md-offset-9 --}} <button id="btn_cancelar"
					class="btn btn-primary">
					<span class="texto-botoes-acao"> CANCELAR </span>
				</button>
				<button type="submit" id="btn_salvar" class="btn btn-success ">
					<span class="texto-botoes-acao"> SALVAR </span>
				</button>
			</div>
		</form>
	</div>
</div>
@endsection

@push("scripts") 
	<script>
		$(document).ready(function(){
	
			//transforma todas as letras do input em MAIÚSCULAS
			$('input').keyup(function() {
				this.value = this.value.toLocaleUpperCase().replace(' ','_').replace(/[^a-z0-9]/gi,'_').replace('__','_');
			});

			//botão de cancelar
			$("#btn_cancelar").click(function(){
				event.preventDefault();
				window.history.back();
			});

			//botão de salvar
			$("#btn_salvar").click(function(){
				event.preventDefault();

				// Fazer a chamada para a API usando o valor do ID
				$.get(url_base+"/api/verificaRoleExiste/" + $("#sistema_id").val() +"/"+ $("#nome").val(), function(resultado){
					if(resultado == 0){
						$( "#frm_role" ).submit();
					}else{
						$.notify("Essa Role já existe!");
						$("#nome").focus();
					}
				});
			});
		});
	</script> 
@endpush