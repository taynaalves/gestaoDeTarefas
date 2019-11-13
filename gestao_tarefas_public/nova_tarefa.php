<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestão de Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Gestão de Tarefas
				</a>
			</div>
		</nav>

		<? if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Tarefa inserida com sucesso!</h5>
			</div>
		<? } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pendentes</a></li>
						<li class="list-group-item active"><a href="#">Inserir nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas as tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Insira sua nova tarefa:</h4>
								<hr />


								<!-- no action passamos o parâmetro acao=inserir e a lógica presente no post controller do diretório privado só será realizado se esse parâmetro estiver settado como "inserir"
								
								Esse parâmetro está definido na url da requisição. Portanto é um parâmetro que será recebido no back end quando o script action for requisitado através da super global GET-->

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição:</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Estudar para avaliação">
									</div>

									<button class="btn btn-success">Cadastrar</button>
									<!-- O submit(botão cadastrar) de um form é uma requisição feita para algum script, que leva consigo informações dos inputs do formulário. Então, quando fazemos o request da action="post_controller.php, podemos passar parâmetros via GET (ex.: acao=inserir) nessa requisição e no lado do servidor no script em questão (post_controller.php), nós recuperamos essa informação através da super global GET -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>