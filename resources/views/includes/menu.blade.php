<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title">
			<h1 class="site_title" style="padding-left: 10px; padding-top: 5px; font-size: 26px;"><i class="fas fa-shield-alt"></i>  SISSEG</h1>
		</div>

		<div class="clearfix"></div>

		
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">

			<ul class="nav side-menu">
				<li><a href="{{ url('/usuarios')}}"><i class="fas fa-crown"></i> Administradores <span class="{{-- fa fa-chevron-down --}}"></span> </a>
				{{-- <ul class="nav child_menu">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="index2.html">Dashboard2</a></li>
					<li><a href="index3.html">Dashboard3</a></li>
				</ul> --}}
				</li>
				<li><a href="{{ url('/funcionarios')}}"><i class="fas fa-user"></i> Funcionários <span class=""></span></a>
				</li>
				{{-- <li><a href="{{ url('/cargos')}}"><i class="fas fa-user"></i> Cargos <span class=""></span></a>
				</li> --}}
				<li><a href="{{ url('/secretarias')}}"><i class="material-icons mat_icone">account_balance</i> Secretarias <span class=""></span></a>
				</li>
				{{-- <li><a href="{{ url('/setores')}}"><i class="fas fa-user"></i> Setores <span class=""></span></a> --}}
				</li>
				<li><a href="{{ url('/sistemas')}}"><i class="fas fa-sitemap"></i> Sistemas <span class=""></span></a>
				</li>
				<li><a href="{{ url('/roles')}}"><i class="fas fa-wrench"></i> Roles <span class=""></span></a>
				</li>
				<li><a href="{{ url('/opcoes')}}"><i class="fas fa-cog"></i> Opções <span class=""></span></a>
				</li>
			</ul>
			</div>
			<div class="menu_section">
			</div>

		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">

			<a data-toggle="tooltip" data-placement="top" title="" style="color:#fff;" href="{{ route('login') }}"
			onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>
