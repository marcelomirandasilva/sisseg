@extends('principal') 

@section('conteudo') 
	<div class="x_panel">
		<div class="x_title">
			<h2> Roles </h2>
			<a href="{{ url('roles/create') }}" class="btn-circulo btn  btn-success btn-md  pull-right "
				data-toggle="tooltip" data-placement="bottom" title="Adiciona uma Role"> Adicionar </a>
			<div class="clearfix"></div>
		</div>

		<div class="x_panel">
			<div class="x_panel">
				<label class="col-md-3 col-sm-3 col-xs-12" for="selecao" style="margin-top: 5px;">Sistema</label>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<select name="selecao" id="selecao" class="form-control"> @foreach($sistemas as $sistema) <option
							value="{{$sistema->id}}"> {{$sistema->nome}} </option> @endforeach <option value="TODOS"
							selected="selected">TODOS</option>
					</select>
				</div>
			</div>

			<div class="x_panel">
				<div class="x_content">
					<table id="tb_role" class="table table-striped table-bordered compact">
						<thead>
							<tr>
								<th>Role</th>
								<th>Sistema</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody class="tabela_compacta"> 
							@foreach($roles as $role) 
								<tr>
									<td> {{$role->nome}} </td>
									<td> {{$role->sistema->nome}} </td>
									<td>
										<a class="btn_ativa btn btn-warning btn-xs action  pull-right  botao_acao"
											data-toggle="tooltip" data-placement="bottom" title="Editar"
											href="{{ url('roles/' . $role->id . '/edit' )}}">
											<i class="glyphicon glyphicon-pencil "></i>
										</a>
										<a class="btn_ativa btn btn-primary btn-xs action  pull-right  botao_acao"
											data-toggle="modal" data-target="#myModal{{ $role->id }}" data-placement="bottom"
											title="Visualizar" href="#">
											<i class="glyphicon glyphicon-eye-open "></i>
										</a>
										<a class="btn_ativa btn btn-success btn-xs action  pull-right  botao_acao"
											data-toggle="modal" data-target="#myModal{{ $role->id }}" data-placement="bottom"
											title="Permissões" href="#">
											<i class="glyphicon glyphicon-list-alt"></i>
										</a>
									</td>
								</tr> 
							@endforeach 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection
	 
@push('scripts')
	
	<script>
		$(document).ready(function(){
			$.fn.dataTable.moment( 'DD/MM/YYYY' );
			var datatables_abastece = $("#tb_role").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive : true,
				processing: true,
			});

			//botão de exclusão
			$("table#tb_role").on("click", "#btn_exclui_abastecimento",function(){
				event.preventDefault();
				let id_abastecimento = $(this).data('abastecimento');
				let btn = $(this);
				let inputValue;

				
				//verifica se o botao está desabilitado por conta da ACL
				if( $(this).data('desabilitado') )
				{ 
					funcoes.notificationRight("top", "right", "danger", "Esse usuário não tem permissão para executar essa Ação!");
					return
				}
 
				swal({
					title: 'Confirmar a EXCLUSÃO deste Abastecimento?<br/>Justifique:',
					type: 'question',
					input: 'textarea',
					inputAttributes: {
						autocapitalize: 'off',
					},
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não',
					inputValidator: (text) => {
						return new Promise((resolve) =>{
							if (text.length > 10) {
								resolve();
								inputValue = text;
							} else {
								resolve('Informe mais de 10 caracteres para justificar');
							}
						})
					}
				}).then((result) => {
					if (result.value) {
						$.post("{{ url('abastecimento/') }}/"+id_abastecimento, {
							_token  : "{{ csrf_token() }}",
							_method : 'DELETE',
							id: 			id_abastecimento,
							motivo: 	inputValue,
							},function(data){
								if(data =="ok"){

									//exclui a linha no datatables
									$("table#tb_role").DataTable().row( btn.parents('tr') ).remove().draw();
									
									swal(
										'Abastecimento EXCLUÍDO',
										' ',
										'success',
									)
								}else{
									funcoes.notificationRight("top", "right", "danger", data);
								}
			
							})         
						
					} else {
						swal(
							'Exclusão Cancelada',
							' ',
							'error'
						)
					}
				});
			});
		});


		
		
	</script> 
@endpush