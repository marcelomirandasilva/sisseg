@extends('principal') 
@section('conteudo') 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2> Sistemas </h2>
				<a href="{{ url('sistemas/create') }}" class="btn-circulo btn  btn-success btn-md  pull-right "
					data-toggle="tooltip" data-placement="bottom" title="Adiciona um Sistema"> Adicionar </a>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable" class="table table-striped table-bordered compact">
					<thead>
						<tr>
							<th>Sistema</th>
							<th>Descrição</th>
							<th>Ativo</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody class="tabela_compacta"> {{-- Iterar por cada item da lista $sistemas e chamá-la de $sistema --}}
						@foreach($sistemas as $sistema) <tr>
							<td> {{$sistema->nome}} </td>
							<td> @if($sistema->descricao) {{$sistema->descricao}} @else --- @endif </td>
							<td> @if($sistema->ativo) Sim @else Não @endif </td>
							<td>
								<a class="btn_ativa btn btn-warning btn-xs action  pull-right  botao_acao" data-toggle="tooltip"
									data-placement="bottom" title="Editar" href="{{ url('sistemas/' . $sistema->id . '/edit' )}}">
									<i class="glyphicon glyphicon-pencil "></i>
								</a>
								<a class="btn_ativa btn btn-primary btn-xs action  pull-right  botao_acao" data-toggle="modal"
									data-target="#myModal{{ $sistema->id }}" data-placement="bottom" title="Visualizar" href="#">
									<i class="glyphicon glyphicon-eye-open "></i>
								</a>
								<a class="btn_ativa btn btn-success btn-xs action  pull-right  botao_acao" title="Roles"
									href="{{ url('roles')}}">
									<i class="fa fa-wrench"></i>
								</a>
							</td>
						</tr> @endforeach </tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Inicio Modal --> 
	@foreach($sistemas as $key=> $sistema) 
		<div class="modal fade" id="myModal{{ $sistema->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background: #342a54; color: #fff;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="color: #fff;">&times;</span>
						</button>
						<h5 class="modal-title text-center " id="exampleModalLabel">SISTEMA</h5>
					</div>
					<div class="modal-body">
						<br>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="nome">Nome:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="nome" class="form-control" name="nome" style="margin-top: -6px;" autofocus
									value="{{ $sistema->nome or old('nome') }}">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="ativo">Ativo:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="ativo" id="ativo" class="form-control" name="ativo" style="margin-top: -6px;"
									value="@if($sistema->ativo) Sim @else Não @endif">
							</div>
						</div>
						<br><br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
						<a href="{{ url('sistemas/' . $sistema->id . '/edit' )}}" class="btn btn-warning" data-toggle="tooltip"
							data-sistema="{{ $sistema->id }}" data-placement="bottom">Editar</a>
					</div>
				</div>
			</div>
		</div> 
	@endforeach
	<!-- Fim Modal -->
@endsection
@push('scripts')
	<!-- Datatables -->
	<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
	<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
	<script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
	<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
	<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
	
	<script>
		$(function(){

			$().DataTable({
			"language": {
				"url": "js/portugues.json"
			}
			});

		});

	</script> 
@endpush