@extends('principal')

@section('conteudo')

<div class="title_left">
    <h3> Lista de Administradores {{-- <small>Some examples to get you started</small> --}}</h3>
    <a class="btn btn-success title-right" style="margin-left: 90%;" href="{{ url ('usuarios/create')}}">Adicionar</a>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Administradores {{-- <small>Users</small> --}}</h2>
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
 								<th>Email</th>
                <th>Ação</th>
 							</tr>
 						</thead>

 						<tbody>

              {{-- Iterar por cada item da lista $usuarios e chamá-lo de $usuario --}}
              @foreach($usuarios as $usuario)

                {{-- Linha --}}
                <tr>
                  <td>
                    {{$usuario->name}}
                  </td>
                  <td>
                    {{$usuario->email}}
                  </td>
                  
                      <td>
                        <a  
                          class="btn-excluir btn btn-danger btn-xs action  pull-right  botao_acao " 
                          data-id="{{$usuario->id}}"
                          data-nome="{{ $usuario->name }}"
                          data-toggle="tooltip"
                          data-toggle="modal"
                          data-target="#modalexcluir"                          
                          title="Excluir" 
                          href="#">
                          <i class="glyphicon glyphicon-remove "></i>
                        </a>

                        <a  
                          class="btn_ativa btn btn-warning btn-xs action  pull-right  botao_acao" 
                          data-toggle="tooltip" 
                          data-placement="bottom" 
                          title="Editar"
                          href="{{ url('usuarios/' . $usuario->id . '/edit' )}}">  
                          <i class="glyphicon glyphicon-pencil "></i>
                        </a>

                        {{-- <a  
                          class="btn_ativa btn btn-primary btn-xs action  pull-right  botao_acao" 
                          data-toggle="tooltip" 
                          data-funcionario =
                          data-placement="bottom" 
                          title="Visualizar"
                          href="{{ url('usuarios/' . $usuario->id )}}">  
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

    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      $(function(){

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