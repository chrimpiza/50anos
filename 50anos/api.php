<?php

	$nomeArquivo = "api.php"; //Coloar o nome do arquivo, para impedir o acesso direto do arquivo.
	if(basename($_SERVER["PHP_SELF"]) == $nomeArquivo){
		die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('index.php')</script>");
	}

	class Api {
		public function __construct(){
			error_reporting(E_ALL);
			ini_set('display_errors', 0);
			header('Content-Type: application/json');
		}
		public function listaFotos(){
			$aux = scandir("img/");
			foreach ($aux as $key => $value) {
				if (($value == ".") || $value == "..") $aux[$key] = "";
			}
			$aux = array_filter($aux);
			foreach ($aux as $key => $value) {
				$retorno[] = $value;
			}
			echo json_encode($retorno);
		}
		public function guardaFotos(){
			$permitidos = array(".gif", "jpeg", ".jpg", ".png", ".bmp");
			foreach ($_FILES["fotos"]["name"] as $key => $value) {
				$extencao = strtolower(substr($value,-4));
				if(in_array($extencao, $permitidos)){
					if($_FILES["fotos"]["tmp_name"][$key] != ""){
						if (move_uploaded_file($_FILES["fotos"]["tmp_name"][$key], "/img/".$_POST["nome"]."-". $_FILES["fotos"]['name'][$key])){
								$sucesso[] = "/img/".$_POST["nome"]."-". $_FILES["fotos"]['name'][$key];
						}
						else {
							$erro[] = $_FILES["fotos"]["tmp_name"][$key];
						}
					}
					else{
						$retorno = array('erro' => "Houve um erro ao enviar suas fotos. Entre em contato com ch_stoever@hotmail.com");
						echo json_encode($retorno);
						return 0;
					}
				}
				else {
					$retorno = array('erro' => "Este formato n&atilde;o &eacute; suportado.");
					echo json_encode($retorno);
					return 0;
				}
			}
			require_once("phpmailer/class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->Username = "";
			$mail->Password = "";
			$mail->SetFrom("christhian.stoever@gmail.com", "50anos GEPJ");
			$mail->Subject = "Algúem enviu fotos";
			$mail->Body = "
				Nome: ".$_POST['nome']."
				E-mail: ".$_POST['email']."\n";
			if (isset($sucesso)){
				$mail->Body .= "
				Esses Foram Enviados: \n";	
				foreach ($sucesso as $key) {
					$mail->Body .= $key."\n";
				}
			}
			if (isset($erro)){
				$mail->Body .= "
				Essses tiveram Erro:";
				foreach ($erro as $key) {
					$mail->Body .= $key."\n";
				}
			}
			$mail->AddAddress("ch_stoever@hotmail.com");
			if(!$mail->Send()) {
				$retorno = array('erro' => "Erro ao enviar o e-mail de confirma&ccedil;&atilde;o");
				echo json_encode($retorno);
				return 0;
			}
			else {
				$retorno = array('sucesso' => "Fotos enviadas. Obrigado por sua contribui&ccedil;&atilde;o");
				echo json_encode($retorno);
				return 1;
			}
		}
	}
	
?> 
