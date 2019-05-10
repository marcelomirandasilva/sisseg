@extends('principal') 
@section('conteudo') <div class="x_panel">
	<div class="x_title">
		<h2>Sistema</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<form id="frm_sistema" method="POST" action="{{url("sistemas")}}" aria-label="{{__('Register')}}"> @csrf <div
				class="form-group row">
				<label for="nome" class="col-md-2 col-form-label text-md-right">{{__('Nome')}}</label>
				<div class="col-md-6">
					<input id="nome" type="text" class="form-control{{$errors->has('nome') ? ' is-invalid' : ''}}"
						name="nome" value="" required autofocus> @if ($errors->has('name')) <span
						class="invalid-feedback" role="alert">
						<strong>{{$errors->first('nome')}}</strong>
					</span> @endif </div>
			</div>
			<div class="form-group row">
				<label for="ativo" class="col-md-2 col-form-label text-md-right">{{__('Ativo')}}</label>
				<div class="col-md-6">
					<select id="ativo" class="form-control{{$errors->has('ativo') ? ' is-invalid' : ''}}" name="ativo"
						value="" required>
						<option value="">Selecione...</option>
						<option value="1">Sim</option>
						<option value="0">Não</option>
					</select> @if ($errors->has('ativo')) <span class="invalid-feedback" role="alert">
						<strong>{{$errors->first('ativo')}}</strong>
					</span> @endif </div>
			</div> {{-- BOTÕES --}} <div class="ln_solid"> </div>
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
				this.value = this.value.toLocaleUpperCase();
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
				$.get("/api/verificaSistemaExiste/" + $("#nome").val(), function(resultado){
					if(resultado == 0){
						$( "#frm_sistema" ).submit();
					}else{
						$.notify("Esse sistema já existe!");
						$("#nome").focus();
					}
				});
			});
		});
	</script> 
@endpush