@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>Setor</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">

			<form method="POST" action="{{ url("setores/" . $setor->id) }}" aria-label="{{ __('Register') }}">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $setor->nome or old('nome') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secretaria" class="col-md-2 col-form-label text-md-right">{{ __('Secretaria') }}</label>

                            <div class="col-md-6">
                                <input id="secretaria" type="text" class="form-control{{ $errors->has('secretaria') ? ' is-invalid' : '' }}" name="secretaria" value="{{ $setor->secretaria->nome or old('secretaria') }}" required>

                                @if ($errors->has('secretaria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secretaria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operante" class="col-md-2 col-form-label text-md-right">{{ __('Operante') }}</label>

                            <div class="col-md-6">
                                <select id="operante" class="form-control{{ $errors->has('operante') ? ' is-invalid' : '' }}" name="operante" required>

                                    @if ($setor->operante)
                                        <option value="0">Não</option>
                                        <option value="1" selected>Sim</option>
                                    @else
                                        <option value="0" selected>Não</option>
                                        <option value="1" >Sim</option>
                                    @endif

                                </select>

                                @if ($errors->has('operante'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('operante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
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
