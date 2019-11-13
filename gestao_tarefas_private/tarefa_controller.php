<?php

	/* A tarefa controller é responsavel por instanciar o objeto tarefa (por meio da classe tarefa.model.php) e através da classe tarefa.service.php (lógica do CRUD), em conjunto com a classe de conexão, vamos controlar a persistência de dados no BD   */

	/* require -> Utilizamos para recuperar as classes model, service e conexão do diretório privado */
	    require 'C:/xampp/htdocs/gestao_tarefas_private/tarefa.model.php';
		require 'C:/xampp/htdocs/gestao_tarefas_private/tarefa.service.php';
		require 'C:/xampp/htdocs/gestao_tarefas_private/conexao.php';


	/* Apartir da super globbal GET, recuperamos o parâmetro acao e
	Verificamos como o indice está settado */
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		//instancia do objeto tarefa
		$tarefa = new Tarefa();
		
		//set dos atributos do objeto tarefa via POST
		$tarefa->__set('tarefa', $_POST['tarefa']);
		
		//instância de conexao
		$conexao = new Conexao();

		// Instancia do tarefa service ->recupera o objeto tarefa e a conexao para realização das operações no bd
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		//Passamos para uma variavel - $tarefas o retorno dos objetos que ocorre no método recuperar na classe PostService 
		$tarefas = $tarefaService->recuperar();
	
	} else if($acao == 'atualizar') {

		$tarefa = new Tarefa();
		/* Apartir da instância de tarefa, recuperamos o id e a descrição da tarefa por meio da super global POST e settamos esses valores*/
		$tarefa->__set('id', $_POST['id'])
			->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		
		/* TESTE */
		if($tarefaService->atualizar()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');	
			} else {
				header('location: todas_tarefas.php');
			}
		}


	} else if($acao == 'remover') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($acao == 'marcarRealizada') {

		$tarefa = new Tarefa();
		//settamos o parâmetro id da tarefa recebido via GET e também settamo o status da tarefa
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($acao == 'recuperarTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	}


?>