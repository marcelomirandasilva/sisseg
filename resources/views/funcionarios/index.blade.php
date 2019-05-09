@extends('principal')

@section('conteudo')
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2> Funcionários </h2>
				<a href="{{ url('funcionarios/create') }}" class="btn-circulo btn  btn-success btn-md  pull-right "
					data-toggle="tooltip" data-placement="bottom" title="Adiciona um Funcionário"> Adicionar </a>
				<div class="clearfix"></div>
			</div>
	
			<div class="x_content">
				<table id="tb_funcionarios" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Secretaria</th>
							<th>Tipo</th>
							<th>Setor</th>
							<th>Ações</th>
						</tr>
					</thead>

					<tbody>

					@foreach($funcionarios as $funcionario)
						<tr>
							<td> {{$funcionario->nome}}			</td>
							<td> {{$funcionario->cargo->secretaria->sigla}}	</td>
							<td> {{$funcionario->tipo}}			</td>
							<td> {{$funcionario->setor->nome}}	</td>
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
									href="{{ url('funcionarios/' . $funcionario->id . '/edit' )}}">  
									<i class="glyphicon glyphicon-pencil "></i>
								</a>
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
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"    type="text/javascript"></script>
	<script src="http://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"  type="text/javascript"></script>
	


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
      });
       
	</script>

@endpush