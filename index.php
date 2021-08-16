<?php

  //Token - Token de segurança para validar e saber que estamos chamando a api
  //Ação - o que vamos fazer ?
  //ID - ID DO CLIENTE ? 
  //Valor - Nome do Cliente, ou atualização do cliente

  define('TOKEN', "afhdsçiofjhapiosd1231312fpaodishf");

  if(isset($_GET['token'])){
    $token = $_GET['token'];
    if($token == TOKEN){
      // PODEMOS CONTINUAR NA API! TEMOS ACESSO

      if(isset($_GET['acao'])){
        $pdo = new PDO('mysql:host=localhost;dbname=api_curso','root','');
        $acao = $_GET['acao'];

        if($acao == 'novo_contato'){

          $nome = isset($_GET['nome']) ? $_GET['nome'] : '';

          $sql = $pdo->prepare('INSERT INTO `clientes` VALUES (null,?)');
          if($sql->execute(array($nome))){
            die(json_encode(array('sucesso'=>true, 'inserido'=>$nome)));
          }else{
            die(json_encode(array('sucesso'=>false, 'erro'=>'não foi possível inserir seu contato.')));
          }

        }else if($acao == 'deletar_contato'){
          if(!isset($_GET['id']))
            die(json_encode(array('erro'=>'Precisamos de um id.')));
          $id = (int)$_GET['id'];

          $pdo->exec("DELETE FROM `clientes` WHERE id = $id");

          die(json_encode(array('sucesso'=>true, 'deletado'=>$id)));

        }else if($acao == 'atualizar_contato'){

        }else if($acao == 'visualizar_contato'){

        }else{
          die('A ação especificada não é valida em nosso sistema de API.');
        }


      }else{
        die('Você não pode conectar na API sem uma ação definida');
      }
    }else{
      die('Não fio possível conectar na API seu token está errado.');
    }
  }else{
    die('Você precisa especificar um token de segurança.');
  }

?>