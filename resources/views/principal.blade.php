<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/seg.png" type="image/ico" />

		<title>Sistema de Segurança</title>

		<!-- Bootstrap -->
		<link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		
		<!-- NProgress -->
		<link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
		<!-- iCheck -->
		<link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

		<!-- bootstrap-progressbar -->
		<link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
		<!-- JQVMap -->
		<link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
		<!-- bootstrap-daterangepicker -->
		<link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
		
		<!-- sweetalert2 -->
		<link href="{{ asset('vendors/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
		
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
	
		 
		{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> --}}
		
		
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf/dt-1.10.18/r-2.2.2/datatables.min.css"/>
			
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.11.14/jquery.timepicker.min.css">       

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			
		<!-- Custom Theme Style -->
		<link href="{{ asset('build/css/custom.min.css')}}" rel="stylesheet">

		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	</head>

	<body class="nav-md" style="color: #000;">
		<div class="container body">
			<div class="main_container">

			@include('includes.menu')

			@include('includes.topbar')

			<!-- page content -->
			<div class="right_col" role="main">

				@yield ('conteudo')

			</div>

				@include('includes.footer')

			</div>
		</div>

		<!-- jQuery -->
		<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
		<!-- Bootstrap -->
		<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<!-- FastClick -->
		<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
		<!-- NProgress -->
		<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
		<!-- Chart.js -->
		<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
		<!-- gauge.js -->
		<script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
		<!-- bootstrap-progressbar -->
		<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
		<!-- iCheck -->
		<script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
		<!-- Skycons -->
		<script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
		<!-- Flot -->
		<script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
		<script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
		<script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
		<!-- Flot plugins -->
		<script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
		<script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
		<script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
		<!-- DateJS -->
		<script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
		<!-- JQVMap -->
		<script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
		<script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
		<script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
		<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

		<!-- sweetalert2 -->
		<script src="{{ asset('vendors/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

		<script src="{{ asset('js/notify.js') }}"></script>

		<!-- Custom Theme Scripts -->
		<script src="{{ asset('build/js/custom.js') }}"></script>

		
		<!-- Datatables -->
		<!-- Datatables -->
		<script type="text/javascript"
			src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js">
		</script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
		<script src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js" type="text/javascript"></script>
			

		<script src="{{ asset('/js/funcoes.js')}}"></script>

		
		<script>
			//variáveis globais ao sistema
			let url_base       = "{{ url("/") }}"; 
			let token          = "{{ csrf_token() }}";

			//mensagens de sucesso
			@if (session('sucesso'))
				$.notify("{{ session('sucesso') }}", "success");
			@endif

			//mensagem para os erros de acesso pela ACL
			@if (session('error'))
				$.notify("{{ session('error') }}", "warn");
			@endif
			

			// Testar se há algum erro, e mostrar a notificação 
			var tempo = 0;
			var incremento = 500;
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					setTimeout(function(){funcoes.notificationRight("top", "right", "danger", "{{ $error }}"); }, tempo);
					tempo += incremento;
				@endforeach
			@endif

		</script>   


		@stack('scripts')



	</body>
</html>
