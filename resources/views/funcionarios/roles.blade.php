@extends('principal') 
@section('conteudo') <div class="x_panel">
	<div class="x_title">
	<h2>Roles do Funcionário</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div class="row">
			<div class="col-md-4">
				<table class="table table-bordered tabela_compacta ">
					<tr><td><b>Funcionário</b></td> 	<td>{{$funcionario->nome}}</td></tr>
					<tr><td><b>Email</b></td> 			<td>{{$funcionario->email}}</td></tr>
					<tr><td><b>Secretaria</b></td>	<td>{{$funcionario->setor->secretaria->nome}}</td></tr>
					<tr><td><b>Setor</b></td>			<td>{{$funcionario->setor->nome}}</td></tr>
					<tr><td><b>Cargo</b></td>			<td>{{$funcionario->cargo->nome}}</td></tr>
					<tr><td><b>Tipo</b></td>			<td>{{$funcionario->tipo}}</td></tr>
				</table>
			</div>
			
			<div class="col-md-1"> </div>

			<div class="col-md-6 " style="border-style:  dashed; border-color: darkgrey; border-radius: 10px; border-width: 1px">
				<div style="margin-top: 10px">
					<label for="sistema_id" class="control-label col-md-2 {{-- col-md-offset-2 --}}">Sistema</label>
					<div class="col-md-8 col-sm-12 col-xs-12">
						<select name = "sistema_id" id="sistema_id" class="form-control selectpicker error">
							<option value=""> Selecione... </option>
								@foreach($sistemas as $sistema)
										<option value={{$sistema->id }}> {{$sistema->nome}} </option>
								@endforeach
						</select>	
					</div>
				</div>	
				<br><br><br>
				<div >
					<label for="role_id" class="control-label col-md-2 {{-- col-md-offset-2 --}}">Role</label>
					<div class="col-md-8 col-sm-12 col-xs-12">
						<select name = "role_id" id="role_id" class="form-control selectpicker error">
							<option value=""> Selecione... </option>
								@foreach($roles as $role)
										<option value="{{$role->id }}"> {{$role->nome}} </option>
								@endforeach
						</select>	
					</div>
				</div>

				<div class="col-md-7" style="text-align: center; margin-top: 20px;">
					<button  id="btn_conceder"
						class="btn-circulo btn  btn-success btn-md "
						data-toggle="tooltip" 
						data-placement="bottom" 
						title="Concede essa Role"> 
						Conceder 
					</button>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>

		<table id="tb_role" class="table table-striped table-bordered compact">
			<thead>
				<tr>
					<th>Role</th>
					<th>Sistema</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody class="tabela_compacta"> 
				@foreach($funcionario->roles as $role) 
					<tr>
						<td> {{$role->nome}} </td>
						<td> {{$role->sistema->nome}} </td>
						<td>
							<a href='#' id='btn_remove_role' class='btn btn-danger btn-xs  action botao_acao'  data-toggle='tooltip' data-role = {{$role->id}}  data-placement='bottom' title='Remove essa Role'> <i class='glyphicon glyphicon-remove '></i></a>
							
						</td>
					</tr> 
				@endforeach 
			</tbody>
		</table>
		


	</div>





</div>
@endsection

@push("scripts") 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

	<script>
		$(document).ready(function(){
			
			$("#sistema_id").change(function() {
				var sel = document.getElementById('role_id');
				if( $("#sistema_id option:selected").index() > 0)
				{
					console.log($("select#sistema_id  option:selected ").val());

					$.get(url_base+'/buscaRoleSistema/'+$("select#sistema_id  option:selected ").val(), function(res){
					
						$("select#role_id").empty();	
						var opt = document.createElement('option');
						opt.appendChild( document.createTextNode("Selecione... ") );
						opt.value = ""; 
						sel.appendChild(opt); 
					
						for (i = 0; i < res.length; i++) { 
							var opt = document.createElement('option');
							opt.appendChild( document.createTextNode(res[i]['nome']) );
							opt.value = res[i]["id"]; 
							sel.appendChild(opt); 
						}
					});
				}else{
					$("select#role_id").empty();	
				}
			});


			//botão CONCEDER
			$("#btn_conceder").click(function(){

				$.post(url_base+'/associacaoRole', {
					_token: 				'{{ csrf_token() }}',
					funcionario_id: 	{{$funcionario->id}},
					role_id:				$("select#role_id  option:selected ").val(),
					acao:					'I'
				}, function(res){
					console.log(res);
					var i;
					
					
					if(res =="OK")
					{

						v_role			= $("select#role_id option:selected").html();
						v_sistema		= $("select#sistema_id option:selected").html();
							
						v_btn_excluir=
							"<a href='#' id='btn_remove_role' class='btn btn-danger btn-xs  action botao_acao'  data-toggle='tooltip' data-role = "+$("select#role_id  option:selected ").val()+"  data-placement='bottom' title='Remove essa Role'> <i class='glyphicon glyphicon-remove '></i></a>"

				
						var t = $('#tb_role').DataTable();
    					
						t.row.add( [
							v_role,
							v_sistema,
							v_btn_excluir
						] ).draw( false );

					}else if(res =="JA_POSSUI"){
						swal.fire(
									'O funcionário já possi essa Role',
									' ',
									'warning',
								)
					}



				});

	      });


			//botão REMOVER
			//botão de exclusão
			$("table#tb_role").on("click", "#btn_remove_role",function(){
				event.preventDefault();
				let id_role = $(this).data('role');
				let btn = $(this);
				let inputValue;

				Swal.fire({
					title: 'Confirmar a REMOÇÃO dessa Role?',
					type: 'question',
					
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não',
					
				}).then((result) => {
					if (result.value) {
						$.post(url_base+'/associacaoRole', {
							_token: 				'{{ csrf_token() }}',
							funcionario_id: 	{{$funcionario->id}},
							role_id:				id_role,
							acao:					'R'
						}, function(res){
	
							if(res =="OK"){
								//exclui a linha no datatables
								$("table#tb_role").DataTable().row( btn.parents('tr') ).remove().draw();
								
								swal.fire(
									'Role REMOVIDA',
									' ',
									'success',
								)
							}
			
						})         
						
					} else {
						swal.fire(
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