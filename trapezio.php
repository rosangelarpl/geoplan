<?php
session_start();
include_once "header.php";
?>
    <h2> Trapézio </h2>
    <h3> O que é um Trapézio?</h3>
    <p> A área de um polígono convexo é o espaço preenchido por sua superfície. Todas as vezes que obtivermos o cálculo de área de determinada região, sua unidade de medida estará elevada ao quadrado (km², cm², m² etc.).</p>
    <p>O trapézio é um quadrilátero, haja vista que possui quatro lados. A soma dos seus ângulos internos e externos é igual a 360°. Todo trapézio possui um par de lados paralelos. Observe a figura a seguir:</p>
    <img src="images/trapezio.jpg" alt="" class="trapezio1">
    <p>Para calcularmos a área de um trapézio, devemos saber as medidas referentes à base maior (b), base menor (a) e altura (h). Veja:</p>
    <h4>Fórmula da Área do Trapézio</h4>

    <div class="container">
        <form>
          <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
          <div class="form-group row">
            <div class="col-sm-12">
              Lado Maior: <input type="text" class="form-control" placeholder="lado maior" id="ladomaior">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              Lado Menor: <input type="text" class="form-control" placeholder="lado menor" id="ladomenor">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
            Altura:<input type="text" class="form-control" placeholder="Altura" id="altura">
            </div>
          </div>
              <button type="button" value="Calcular" class="btn btn-primary" onclick="calcularAreaTrapezio();return true"/>Calcular</button>
          <div class="form-group row">
            <div class="col-sm-12">
              Área:<input type="text" class="form-control" id="area" name="area">
            </div>
          </div>
        </form>
    </div>

      <h5>Material Retirado de:</h5>
      <p> OLIVEIRA, Naysa Crystine Nogueira. "Área do trapézio"; Brasil Escola. Disponível em http://brasilescola.uol.com.br/matematica/area-trapezio.htm. Acesso em 28 de novembro de 2017. </p>
<?php
  include_once "footer.php";
