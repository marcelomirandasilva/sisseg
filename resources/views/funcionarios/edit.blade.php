@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>Funcionarios</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">
			
            <form method="POST" action="{{ url("funcionarios/" . $funcionario->id) }}" aria-label="{{ __('Register') }}">
                        @csrf

                          {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="Nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-7">
                                <input id="Nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $funcionario->nome or old('nome') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     {{--    <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $funcionario->email or old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                      {{--   <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}
                        
                        <div class="form-group row">
                            <label for="secretaria" class="col-md-2 col-form-label text-md-right">{{ __('Secretaria') }}</label>

                            <div class="col-md-7">
                                <select id="secretaria" class="form-control{{ $errors->has('secretaria') ? ' is-invalid' : '' }}" name="secretaria_id" required autofocus>
                                    <option value="{{ $funcionario->secretaria_id->nome or old('secretaria_id->nome') }}">{{ $funcionario->secretaria_id->nome or old('secretaria->nome') }}</option>
                                        
                                    @foreach($secretarias as $secretaria)

                                         <option value="{{$secretaria->id}}">{{$secretaria->nome}}</option>

                                    @endforeach
        
                                </select>

                                @if ($errors->has('secretaria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secretaria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="setor" class="col-md-2 col-form-label text-md-right">{{ __('Setor') }}</label>

                            <div class="col-md-7">
                                <select id="setor" class="form-control{{ $errors->has('setor') ? ' is-invalid' : '' }}" name="setor_id"required autofocus>
                                    
                                    <option value="{{ $funcionario->setor->nome or old('setor->nome') }}">{{ $funcionario->setor->nome or old('setor->nome') }}</option>

                                    @foreach($setores as $setor)

                                         <option value="{{$setor->id}}">{{$setor->nome}}</option>

                                    @endforeach

                                </select>

                                @if ($errors->has('setor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('setor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-2 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-7">
                                <select id="cargo" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo_id"required autofocus>

                                    <option value="{{ $funcionario->cargo->nome or old('cargo->nome') }}">{{ $funcionario->cargo->nome or old('cargo->nome') }}</option>

                                    @foreach($cargos as $cargo)

                                         <option value="{{$cargo->id}}">{{$cargo->nome}}</option>

                                    @endforeach
                                  
                                </select>

                                @if ($errors->has('cargo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-2 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-7">
                                <select id="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                    <option value="{{ $funcionario->tipo or old('tipo') }}">{{ $funcionario->tipo or old('tipo') }}</option>
                                        
                                    @foreach($tipos as $tipo)

                                         <option value="{{$tipo}}">{{$tipo}}</option>

                                    @endforeach
        
                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="sistema" class="col-md-2 col-form-label text-md-right">{{ __('Sistemas') }}</label>

                            <div class="col-md-7">
                                <select id="sistema" class="form-control{{ $errors->has('sistema') ? ' is-invalid' : '' }}" name="sistema" required autofocus>

                                    <option value="">Selecione um Sistema...</option>
                                    <option value="1">Habitação</option>
                                     <option value="2">Trabalho</option>
                                    <option value="3">Zoneamento</option>
                                        
                                    {{-- @foreach($sistemas as $sistema)

                                         <option value="{{$sistema->id}}">{{$sistema->nome}}</option>

                                    @endforeach --}}

                                </select>

                                @if ($errors->has('sistema'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sistema') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4" style="margin-left: 174px;">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </div>
                    </form>

		</div>

	</div>

@endsection

@push('scripts')

    <script>

        $(function(){

            // Fazer a chamada no evento CHANGE do select de secretarias

            $("select#secretaria").change(function(){
                
                // Guardar o id da secretaria em uma variável
                let secretaria_id = $(this).val();

                // Fazer a chamada para a API usando o valor do ID
                $.get("/api/setoresporsecretaria/" + secretaria_id, function(resultados){

                    // Deletar todas as options
                    $("select#setor").empty();

                    // Adicionar a opção "Selecione..."
                    $("select#setor").append(`<option value=''>Selecione um Setor...</option>`); 
                    
                    // Iterar por todos os resultados e chamar a função passando o índice e o valor
                    $.each(resultados, function(indice, valor){
                        
                        // Selectionar o Select de Setores e adicionar um option para cada valor
                        $("select#setor").append(`<option value='${valor.id}'>${valor.nome}</option>`); 

                    });

                });

                   $.get("/api/cargosporsecretaria/" + secretaria_id, function(resultados){
                    
                    // Deletar todas as options
                    $("select#cargo").empty();

                    // Adicionar a opção "Selecione..."
                    $("select#cargo").append(`<option value=''>Selecione um Cargo...</option>`); 
                    
                    // Iterar por todos os resultados e chamar a função passando o índice e o valor
                    $.each(resultados, function(indice, valor){
                        
                        // Selectionar o Select de cargos e adicionar um option para cada valor
                        $("select#cargo").append(`<option value='${valor.id}'>${valor.nome}</option>`); 

                    });

                });

            });

            
        });

    </script>

@endpush