<?php
require_once("Utils.php");
class Principal {

    public function __construct(){
        $this->listaDados();        
        
        echo 'ATUALIZANDO SISTEMA - ATUALIZAÇÃO 01';
        $this->atualizaSistema('TESTE BRUNA');
        $this->listaDados();
        
        echo 'ATUALIZANDO SISTEMA - ATUALIZAÇÃO 02';
        $this->atualizaSistema('TESTE BRUNA - 02');
        $this->listaDados();        
        
        echo 'ATUALIZANDO SISTEMA - ATUALIZAÇÃO 03';
        $this->atualizaSistema('CADASTRO');
        $this->listaDados();        
    }

    public function listaDados() {
        $sql = " select * from sistema where siscodigo = 1 order by siscodigo";
        $aDados = getQuery()->selectAll($sql);
        $xDados = array();
        foreach ($aDados as $sDados){
            array_push($xDados, $sDados);
        }

        $total = getQuery()->select("select count(*) as total from sistema");
        $total = intval($total["total"]);
        
        $aDados = array(
            "success" => true,
            "total" => $total,
            "sistema" => $xDados
        );
        
        echo "<pre>" . print_r($aDados, true) ."</pre>";
    }

    public function atualizaSistema($sisnome) {
        $sSql = "UPDATE sistema set sisnome = '" . $sisnome ."' where SISCODIGO = 1";

        // Executa a query de UPDATE
        getQuery()->executaQuery($sSql);
    }
}

new Principal();