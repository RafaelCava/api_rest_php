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
        $acao = $_GET['acao'];

        if($acao == 'novo_contato'){
          die(json_encode(array('sucesso'=>true)));
        }else if($acao == 'deletar_contato'){
          
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