// Calcular área de um triangulo
function calcularAreaTriangulo(){
	var base=document.getElementById("base").value;
	var altura=document.getElementById("altura").value;
	base=base.toString().replace(',','.');
	altura=altura.toString().replace(',','.');

	if(base==""){
	}
	else if(base<0){
	}
	else{
		if(altura==""){
		}
		else if(altura<0){
		}
		else{
				var area=0;
				area=parseInt(base) * parseInt(altura)/2;
				document.getElementById("area").value=Math.round(area*100)/100;
		}
	}
}

// calcular área de um círculo
function calcularAreaCirculo(){
	var raio=document.getElementById("raio").value;
	raio=raio.toString().replace(',','.');
	var area=0;
	area=parseInt(raio) * parseInt(raio) * Math.PI;
	document.getElementById("area").value=Math.round(area*100)/100;
}

// calcular área de um Losango
var calcularAreaLosango = function() {
  var diagonalmenor=document.getElementById("diagonalmenor").value;
	var diagonalmaior=document.getElementById("diagonalmaior").value;
	diagonalmenor=diagonalmenor.toString().replace(',','.');
	diagonalmaior=diagonalmaior.toString().replace(',','.');

	if(diagonalmenor==""){
	}
	else if(diagonalmenor<0){
	}
	else{
			if(diagonalmaior==""){
			}
			else if(diagonalmaior<0){
		}
		else{
			var area=0;
			area=parseInt(diagonalmenor) * parseInt(diagonalmaior)/2;
			document.getElementById("area").value=Math.round(area*100)/100;
		}
  }
}

// calcular área de um Paralelogramo
var calcularAreaParalelogramo = function() {
   return calcularAreaRetangulo()
}

// calcular área de um Retangulo
var calcularAreaRetangulo = function() {
  var base=document.getElementById("base").value;
	var altura=document.getElementById("altura").value;
	base=base.toString().replace(',','.');
	altura=altura.toString().replace(',','.');

	if(base==""){
	}
	else if(base<0){
	}
	else{
		if(altura==""){
		}
		else if(altura<0){
		}
		else{
			var area=0;
			area=parseInt(base) * parseInt(altura);
			document.getElementById("area").value=Math.round(area*100)/100;
		}
	}
}

//Calcular a area do Trapézio
function calcularAreaTrapezio(){
	var ladomenor=document.getElementById("ladomenor").value;
	var ladomaior=document.getElementById("ladomaior").value;
	var altura=document.getElementById("altura").value;
	baseMenor=ladomenor.toString().replace(',','.');
	baseMayor=ladomaior.toString().replace(',','.');
	altura=altura.toString().replace(',','.');

	var area=0;
	area=altura*(parseInt(ladomenor)+parseInt(ladomaior))/2;
  document.getElementById("area").value=Math.round(area*100)/100;
}
