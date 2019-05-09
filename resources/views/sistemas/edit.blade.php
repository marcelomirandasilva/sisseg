@extends('principal')

@section('conteudo')

   <div class="x_panel">

      <div class="x_title">
         <h2>Sistema</h2>
         <div class="clearfix"></div>
      </div>

      <div class="x_content">

         <form method="POST" action="{{ url("sistemas/" . $sistema->id) }}" aria-label="{{ __('Register') }}">
            @csrf

            {{ method_field('PUT') }}

            <div class="form-group row">
               <label for="nome" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>

               <div class="col-md-6">
                  <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $sistema->nome or old('nome') }}" required autofocus>

                  @if ($errors->has('name'))
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('nome') }}</strong>
                     </span>
                  @endif
               </div>
            </div>


            <div class="form-group row">
               <label for="ativo" class="col-md-2 col-form-label text-md-right">{{ __('Ativo') }}</label>

               <div class="col-md-6">

                  <select id="ativo" class="form-control{{ $errors->has('ativo') ? ' is-invalid' : '' }}" name="ativo" required autofocus >
                     @if ($sistema->ativo)
                           <option value="0">Não</option>
                           <option value="1" selected>Sim</option>
                     @else
                           <option value="0" selected>Não</option>
                           <option value="1" >Sim</option>
                     @endif

                  </select>

                  @if ($errors->has('ativo'))
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('ativo') }}</strong>
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
