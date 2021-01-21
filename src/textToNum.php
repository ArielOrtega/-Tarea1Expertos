<?php

    function sexoToNum($sexo){
        if($sexo == 'F'){
            return 1;
        }else{
            return 2;
        }
    }

    function estiloToNum($estilo){
        if($estilo == 'DIVERGENTE'){
            return 1;
        }else if ($estilo == 'CONVERGENTE'){
            return 2;
        }else if ($estilo == 'ASIMILADOR'){
            return 3;
        }else if ($estilo == 'ACOMODADOR'){
            return 4;
        }else{
            return 0;
        }
    }
?>