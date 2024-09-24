<?php

require_once("ConsultaPadrao.php");
class ConsultaMenu extends ConsultaPadrao {

    protected function getTabela(){
        return 'menu';
    }

    protected function getColunaOrdenacao(){
        return 'mencodigo';
    }

    protected function getColunas(){
        // Colunas
        return array(
            "Código",
            "Sistema",
            "Nome",
            "Tabela"
        );
    }

    protected function getColunasBancoDados(){
        // Colunas na mesma ordem dos titulos
        return array(
            "mencodigo",
            "siscodigo",
            "mennome",
            "mentabela"
        );
    }

    protected function getDadosConsulta(){
        $aDados = parent::getDadosConsulta();

        $aDadosNew = array();
        foreach($aDados as $key => $aDadosAtual){
            $siscodigo = $aDadosAtual["siscodigo"];

            // retorna o nome do sistema concatenado com o codigo
            $aDadosSistema = getQuery()->select("select sisnome from sistema where siscodigo = " . $siscodigo);

            $nomeSistemaContatenado = $siscodigo . " - " . $aDadosSistema["sisnome"];

            $aDadosAtual["siscodigo"] = $nomeSistemaContatenado;

            $aDadosNew[$key] = $aDadosAtual;
        }

        return $aDadosNew;
    }
}

new ConsultaMenu();