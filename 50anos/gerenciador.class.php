<?php

	$nomeArquivo = "gerencidor.class.php"; //Coloar o nome do arquivo, para impedir o acesso direto do arquivo.
	if(basename($_SERVER["PHP_SELF"]) == $nomeArquivo){
		die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('index.php')</script>");
	}

	class Gerenciador {
		public function __construct(){
			error_reporting(E_ALL);
			ini_set("display_errors", 0);
			if (isset($_SERVER["PATH_INFO"])){
				$requisicao = explode("/", trim($_SERVER['PATH_INFO'],'/'));
				if (include ($requisicao[0].".php")){
					$aux = ucfirst($requisicao[0]);
					$obj = new $aux;
					$obj->$requisicao[1]();
				}
				else header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
			}
			else {
				require_once "template.php";
			}
		}
	}

?>