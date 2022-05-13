<?php
// Conexão com o banco de dados
include "conexao.php";

// Inicia sessões
session_start();

// Recupera o login
$login = isset($_POST["login"]) ? ($_POST["login"]) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? ($_POST["senha"]) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$login || !$senha)
{
	echo "Você deve digitar sua senha e login!";
	exit;
}
/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/
$SQL = "SELECT nome, login, senha FROM agente WHERE login = '" . $login . "'";
$result_id = mysqli_query($conn,$SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = mysqli_fetch_array($result_id);
	// Agora verifica a senha
	if(!strcmp($senha, $dados["senha"]))
	{
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
		header("Location: ocorrencia.php");
		exit;
	}
	// Senha inválida
	else
	{
        header("Location: login.php");
	exit;
	}
}
	// Login inválido
else
{
	header("Location: login.php");
	exit;
}
