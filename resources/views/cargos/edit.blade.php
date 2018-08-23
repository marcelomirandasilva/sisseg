@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>Cargo</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">

			<form method="POST" action="{{ url("cargos/" . $cargo->id) }}" aria-label="{{ __('Register') }}">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $cargo->nome or old('nome') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-2 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                                <select id="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" value="{{ $cargo->tipo or old('tipo') }}" required>

                                    <option value="E">Efetivo</option>
                                    <option value="C">Comissionado</option>

                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secretaria" class="col-md-2 col-form-label text-md-right">{{ __('Secretaria') }}</label>

                            <div class="col-md-6">
                                <input id="secretaria" type="text" class="form-control{{ $errors->has('secretaria') ? ' is-invalid' : '' }}" name="secretaria" value="{{ $cargo->secretaria->nome or old('secretaria') }}" required>

                                @if ($errors->has('secretaria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secretaria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="operante" class="col-md-2 col-form-label text-md-right">{{ __('Operante') }}</label>

                            <div class="col-md-6">
                                <select id="operante" class="form-control{{ $errors->has('operante') ? ' is-invalid' : '' }}" name="operante" value="{{ $cargo->operante or old('operante') }}" required>
                                    
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>

                                </select>

                                @if ($errors->has('operante'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('operante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4" style="text-align: center;">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </div>
                    </form>

		</div>

	</div>

@endsection
