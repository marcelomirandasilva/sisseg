@extends('principal')

@section('conteudo')

	<div class="x_panel">

		<div class="x_title">
			<h2>Secretaria</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">

			<form method="POST" action="{{ url("secretarias/" . $secretaria->id) }}" aria-label="{{ __('Register') }}">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $secretaria->nome or old('nome') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secretario" class="col-md-2 col-form-label text-md-right">{{ __('Secretario') }}</label>

                            <div class="col-md-6">
                                <input id="secretario" type="text" class="form-control{{ $errors->has('secretario') ? ' is-invalid' : '' }}" name="secretario" value="{{ $secretaria->secretario or old('secretario') }}" required>

                                @if ($errors->has('secretario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secretario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sigla" class="col-md-2 col-form-label text-md-right">{{ __('Sigla') }}</label>

                            <div class="col-md-6">
                                <input id="sigla" type="text" class="form-control{{ $errors->has('sigla') ? ' is-invalid' : '' }}" name="sigla" value="{{ $secretaria->sigla or old('sigla') }}" required>

                                @if ($errors->has('sigla'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sigla') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operante" class="col-md-2 col-form-label text-md-right">{{ __('Operante') }}</label>

                            <div class="col-md-6">
                                <select id="operante" class="form-control{{ $errors->has('operante') ? ' is-invalid' : '' }}" name="operante" value="{{ $secretaria->operante or old('operante') }}" required>
                                    
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>

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