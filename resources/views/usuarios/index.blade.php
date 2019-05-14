@extends('principal')

@section('conteudo')


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<div class="title_left">
				<h2> Administradores {{-- <small>Some examples to get you started</small> --}}</h2>
				<a href="{{ url ('usuarios/create')}}" class="btn btn-success pull-right" >Adicionar</a>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="x_content">
			<table id="tabela" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Ação</th>
					</tr>
				</thead>

				<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td> {{$usuario->name}}</td>
							<td>{{$usuario->email}}</td>
							<td>
								<button class="btn_email_senha btn btn-info btn-xs action  botao_acao" 
									data-toggle="tooltip" 
									data-usuario = {{ $usuario->id }}
									data-placement="bottom" 
									title="Envia NOVA senha por email ao usuario">     
									<i class="glyphicon glyphicon-envelope "></i>
								</button>
								<a class="btn_ativa btn btn-warning btn-xs action   botao_acao" 
									data-toggle="tooltip" 
									data-placement="bottom" 
									title="Editar"
									href="{{ url('usuarios/' . $usuario->id . '/edit' )}}">  
									<i class="glyphicon glyphicon-pencil "></i>
								</a>
								<a  class="btn-excluir btn btn-danger btn-xs action   botao_acao " 
									data-id="{{$usuario->id}}"
									data-nome="{{ $usuario->name }}"
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
</div>

						 

@endsection

@push('scripts')
	
	<script>
		$(function(){
			//configuração da tabela       
			$.fn.dataTable.moment( 'DD/MM/YYYY' );
			
			var tabela = $("#tabela").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive: true,
				"columnDefs": 
					[
						{ className: "dt-head-right", targets: [ 0, 1, 2 ] },
						{ className: "dt-body-center", targets: [ 0, 1, 2 ] },
					] 			
			});

			/* RESETAR A SENHA DE UM USUÁRIO */
			$(".btn_email_senha").click(function(){
				let id_usuario = $(this).data('usuario');
				swal.fire({
					title: 'Confirma a REINICIALIZAÇÃO da senha do funcionário?',
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não',
				}).then(function (resposta) {
					console.log(resposta.value);
					if(resposta.value){
						//chama a rota para zerar a senha e enviar email ao funcionário
						$.post(url_base + '/zerarsenhausuario',{
							_token: 	'{{ csrf_token() }}',
							id: 		id_usuario
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


			$("body").on("click", ".btn-excluir", function(e){

					// Evitar que a página recarregue
					e.preventDefault();

					//Obter os dados do usuário
					let id = $(this).data('id');
					let nome = $(this).data('nome');

					// Configuração do Sweet alert

					swal({
							title: "Atenção!",
							text: "Você realmente deseja excluir o(a) usuário(a) "+nome+" ?",
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
									
									$.post("{{ url("/usuarios/") }}/"+id, {
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

		});
			
	</script>

@endpush