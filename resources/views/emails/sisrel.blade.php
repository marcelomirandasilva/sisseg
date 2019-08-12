
@component('mail::message')

   <p>Olá {{$funcionario->nome}}, </p>
   <br>
   <p>O GESOL mudou!</p>
   <br>
   
   <p>Para acessar o sistema utilize as informações abaixo</p>
   
   <table class="tabela" id="tb_viagens" align="center" width="900px">
      <tr class="tabela">
         <td class="tabela"> ENDEREÇO </td>
         <td class="tabela"> <a href="http://tecnologia360.mesquita.rj.gov.br/sisrel"> http://tecnologia360.mesquita.rj.gov.br/sisrel </a> </td>
      </tr> 
      
      <tr class="tabela">
         <td class="tabela"> USUÁRIO </td>
         <td class="tabela"> 
            @if(isset($funcionario->email))
               {{$funcionario->email}} 
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
