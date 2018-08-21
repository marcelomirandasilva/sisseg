@extends('principal')

@section('conteudo')

<div class="x_panel">

		<div class="x_title">
			<h2>Lista de Secretarias</h2>
			<a class="btn btn-success title-right" style="margin-left: 90%;" href="{{ url ('secretarias/create')}}">Adicionar</a>
			<div class="clearfix"></div>
		</div>

	<div class="x_content">

		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Secretarias {{-- <small>Users</small> --}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 					<table id="datatable" class="table table-striped table-bordered">

 						<thead>
 							<tr>
 								<th>Nome</th>
 								<th>Secretario</th>
 								<th>Sigla</th>
 								<th>Operante</th>
 								<th>Ações</th>
              				</tr>
 						</thead>

 						<tbody>

              {{-- Iterar por cada item da lista $secretarias e chamá-la de $secretaria --}}
              @foreach($secretarias as $secretaria)

                {{-- Linha --}}
                <tr>
                  <td>
                    {{$secretaria->nome}}
                  </td>
                  <td>
                    {{$secretaria->secretario}}
                  </td>
                  <td>
                    {{$secretaria->sigla}}
                  </td>
                  <td>
                    @if($secretaria->operante) Sim @else Não @endif
                  </td>
                  
                      <td>
                        {{-- <a  
                          class="btn_desativa btn btn-danger btn-xs action  pull-right  botao_acao" 
                          data-toggle="tooltip" 
                          data-placement="bottom" 
                          title="Excluir" 
                          href="">
                          <i class="glyphicon glyphicon-remove "></i>
                        </a> --}}

                        <a  
                          class="btn_ativa btn btn-warning btn-xs action  pull-right  botao_acao" 
                          data-toggle="tooltip" 
                          data-placement="bottom" 
                          title="Editar"
                          href="{{ url('secretarias/' . $secretaria->id . '/edit' )}}">  
                          <i class="glyphicon glyphicon-pencil "></i>
                        </a>

                        {{-- <a  
                          class="btn_ativa btn btn-primary btn-xs action  pull-right  botao_acao" 
                          data-toggle="tooltip" 
                          data-funcionario =
                          data-placement="bottom" 
                          title="Visualizar"
                          href="#">  
                          <i class="glyphicon glyphicon-eye-open "></i>
                        </a> --}}
                      </td>
                </tr>
                {{-- /Linha --}}

              @endforeach

                        

 						</tbody>

 					</table>
                  </div>
                </div>
              </div>

	</div>
</div>


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