<?php

namespace App\Entity;

class Vaga{

    //Identificação unica da vaga
    public $id;

    //Titulo da vaga
    public $titulo;

    //Descrição da vaga(Pode coter HTML)
    public $descricao;

    //Define se a vaga está ativa
    public $ativo;

    //Data de publicaçã oda vaga

    public $data;

    //Metodo responsavel por cadastar a nova vaga no banco
    public function cadastrar(){

        // Definir a data 
        $this->data = date('Y-m-d H:i:s');
        // Inserir a vaga no banco

        // Atribuir Id da VAGA NA INSTANCIA 

        //RETORNAR SUCESSO 

    }
}

