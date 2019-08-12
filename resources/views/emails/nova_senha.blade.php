
@component('mail::message')
   <p>Olá {{$funcionario->name}}, </p>
   <br>
   <p> Sua senha foi alterada no Sistema de Segurança da Prefeitura Municipal de Mesquita.</p>
   
   </br>
   <p>Você pode acessar os Sistemas desenvolvidos na Prefeitura utilizando as informações abaixo:</p>
   
   <table class="tabela" id="tb_viagens" align="center" width="900px">
      
      <tr class="tabela">
         <td class="tabela"> USUÁRIO </td>
         <td class="tabela"> 
            @if(isset($funcionario->email))
               {{$funcionario->email}} ou  {{$funcionario->cpf}}
            @else
               {{$funcionario->cpf}}
            @endif
         </td>
      </tr>

      <tr class="tabela">
         <td class="tabela"> SENHA </td> 
         <td class="tabela"> {{$senha}}</td>
      </tr>


   </table>

@endcomponent
