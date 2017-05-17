$(".princip").ready(function (){
	$.getJSON("index.php/api/listaFotos", function(result){
		console.log(result);
		var retorno = result;
		$.each(retorno, function(index, value){
			setTimeout(function(){
				$("html").css({"background-image": "url('img/"+value+"')", 
					"background-repeat": "no-repeat", 
					"background-position": "center",
					"background-attachment": "fixed",
					"-webkit-background-size": "cover",
					"-moz-background-size": "cover",
					"-o-background-size": "cover",
					"background-size": "cover"});
			}, index*4000);

		});
		
	});
});
$.datepicker.regional['pt-BR'] = {
	closeText: 'Fechar',
	prevText: '&lt;Anterior',
	nextText: 'Próximo&gt;',
	currentText: 'Hoje',
	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
	'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
	'Jul','Ago','Set','Out','Nov','Dez'],
	dayNames: ['Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
	dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
	weekHeader: 'Sm',
	dateFormat: 'dd/mm/yy',
	firstDay: 0,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
$(function(){$( "#ingresso" ).datepicker();});
$(function(){$( "#saida" ).datepicker();});

$(document).ready(function () {
	$("#enviar").click(function (event) {
		event.preventDefault();
		var form = $("#formulario")[0];
		var data = new FormData(form);

		$("#enviar").prop("disabled", true);
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: "index.php/api/guardaFotos",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			success: function (data) {
				if (typeof data["erro"] == "undefined"){
					$("#troca").html("<br><p><center><h2>"+data["sucesso"]+"</h2></center></p>");
				}
				else {
					$("#troca").html("<br><p><center><h2>"+data["erro"]+"</h2></center></p>");
				}
			},
			error: function (e) {
				console.log(e);
			}
		});
	});
});