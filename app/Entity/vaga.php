<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

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
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase-> insert([
           'titulo' => $this->titulo,
           'descricao' => $this->descricao,
           'ativo' => $this->ativo,
           'data' => $this->data
        ]);        
        // Atribuir Id da VAGA NA INSTANCIA 

        //RETORNAR SUCESSO 
        return true;
    }
    //Metodo responsavel por atualizar a vaga no banco 
    public function atualizar(){
        return (new Database('vagas'))->update(
            'id = ' .$this->id,
            [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
            ]);
    }

    //metodo responsável por excluir a vaga do campo
    public function excluir(){
        return (new Database('vaga')) -> delete('id = ' .$this->id);

    }

    // Metodo responsavel por obter as vagas do banco
    public static function getVagas($where = null, $order = null, $limit = null){

        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
    //Metodo responsavel por buscar uma vaga com vase no seu id
    public function getVaga($id){
        return (new Database('vagas'))->select('id = ' .$id)
                                      ->fetchObject(self::class);

    }



}



