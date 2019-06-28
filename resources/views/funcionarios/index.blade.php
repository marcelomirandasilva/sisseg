@extends('principal')

@section('conteudo')
	<div class="x_panel">
		<div class="x_title">
			<h2> Funcionários </h2>
			<a href="{{ url('funcionarios/create') }}" class="btn-circulo btn  btn-success btn-md  pull-right "
				data-toggle="tooltip" data-placement="bottom" title="Adiciona um Funcionário"> Adicionar </a>
			<div class="clearfix"></div>
		</div>

		<div class="x_panel">
			<table id="tb_funcionarios" class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Secretaria</th>
						<th>Tipo</th>
						<th>Ações</th>
					</tr>
				</thead>

				<tbody>

					@foreach($funcionarios as $funcionario)
						<tr>
							<td> {{$funcionario->nome}}			</td>
							<td> {{$funcionario->secretaria->sigla}}	</td>
							<td> {{$funcionario->tipo}}			</td>
							<td class="actions">
								<a class="btn_ativa btn btn-primary btn-xs action  botao_acao" title="Visualizar" href="#">
									<i class="glyphicon glyphicon-eye-open "></i>
								</a>								

								<a  
									class="btn btn-success btn-xs action  botao_acao" 
									data-id="{{$funcionario->id}}"
									data-nome="{{ $funcionario->nome }}" 
									data-toggle="tooltip" 
									data-placement="bottom" 
									title="Roles"
									href="{{url('funcionario/roles/'.$funcionario->id)}}">  
									<i class="fa fa-wrench" "></i>
								</a>
								<a  
									class="btn btn-warning btn-xs action  botao_acao" 
									data-toggle="tooltip" 
									data-placement="bottom" 
									title="Editar"
									href="{{ url('funcionarios/'.$funcionario->id .'/edit' )}}">  
									<i class="glyphicon glyphicon-pencil "></i>
								</a>

								<button class="btn_email_senha btn btn-info btn-xs action  botao_acao" 
									data-toggle="tooltip" 
									data-funcionario = {{$funcionario->id}}
									data-placement="bottom" 
									title="Envia NOVA senha por email ao Funcionário">     
									<i class="glyphicon glyphicon-envelope "></i>
								</button>

								<a  
									class="btn-excluir btn btn-danger btn-xs action  botao_acao"
									data-id="{{$funcionario->id}}"
									data-nome="{{ $funcionario->nome }}" 
									data-toggle="tooltip"
									title="Excluir" 
									href="#">
									<i class="glyphicon glyphicon-remove "></i>
								</a>


							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection

@push('scripts')


	

{{-- Sweet Alert --}}

	<script>
		$(function(){

			//configuração da tabela       
			$.fn.dataTable.moment( 'DD/MM/YYYY' );
			
			
			var tabela_funcionarios = $("#tb_funcionarios").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive: true,
				
			});

			$("body").on("click", ".btn-excluir", function(e){
				// Evitar que a página recarregue
				e.preventDefault();

				//Obter os dados do funcionário
				let id = $(this).data('id');
				let nome = $(this).data('nome');

				// Configuração do Sweet alert
				swal({
					title: "Atenção!",
					text: "Você realmente deseja excluir o(a) funcionário(a) "+nome+" ?",
					icon: "warning",
					buttons: {
						cancel: {
						text: "Cancelar",
						value: "cancelar",
						visible: true,
						closeModal: true,
						},
						ok: {
						text: "Sim, exclua!",
						value: 'excluir',
						visible: true,
						closeModal: true,
						}
					}
				}).then(function(resultado){

					if(resultado === 'excluir'){
						// Chamando a url /usuarios/id usando método DELETE e a token de segurança
						$.post("{{ url("/funcionarios/") }}/"+id, {
							id : id,
							_method : "DELETE",
							_token : "{{ csrf_token() }}",
						}).done(function(){
							//Recarregar a página
							location.reload();
						});
					} 
				});
			});   

			/* RESETAR A SENHA DE UM USUÁRIO */
			$(".btn_email_senha").click(function(){
				let id_funcionario = $(this).data('funcionario');
				swal.fire({
					title: 'Confirma a REINICIALIZAÇÃO da senha do funcionário?',
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não',
				}).then(function (resposta) {
					//console.log(resposta.value);
					if(resposta.value){
						//chama a rota para zerar a senha e enviar email ao funcionário
						$.post(url_base + '/zerarsenhafuncionario',{
							_token: 	'{{ csrf_token() }}',
							id: 		id_funcionario
						},function(data){
							funcoes.notificationRight("top", "right", "danger", "Email com nova senha enviado para o funcionário");
						})
					}else{
						swal.fire(
							'Procedimento cancelado',
							' ',
							'warning',
						)
					}

				});
			});
		});
		
	</script>

@endpush