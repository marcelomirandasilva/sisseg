<?php
//pega os valores enum em um campo
if (! function_exists('pegaValorEnum')) {
   function pegaValorEnum($table, $column) {
      //para usar no mysql
      //$type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      /* 
      
         preg_match('/^enum\((.*)\)$/', $type, $matches);
         $enum = array();
         foreach( explode(',', $matches[1]) as $value )
         {
            $v = trim( $value, "'" );
            $enum[] = $v;
         } 
         
      */


      //para usar no postgres
      //  SELECT enum_range(NULL::tp_status)

      // $type = DB::select(DB::raw(" SELECT enum_range(NULL::$column) ")) ;

      // $tipo = DB::select(DB::raw(' SELECT pg_typeof("'. $column .'") from '.$table . ' limit 1 '));

      $tipo = DB::select(DB::raw("SELECT tipo 
                                 FROM sisseg.campos_tipos 
                                 WHERE 
                                    tabela = '$table' AND 
                                    campo = '$column'
                                 LIMIT 1;")) ;
      // dd($tipo);
      $tipo = $tipo[1]->tipo;

     $valores = DB::select(DB::raw(" SELECT enumlabel AS label 
                                    FROM pg_type t 
                                    JOIN pg_enum e ON t.oid = e.enumtypid 
                                    WHERE typname = '$tipo' ")) ;

      $enum = [];

      foreach($valores as $valor){
         $enum[] = $valor->label;
      }
      return $enum;
   }
}