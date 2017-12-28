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
      <div class="area">
        <div class="container">
          <div class="col-md-10">
            <form>
              <p class="instrucoes">DIGITE OS VALORES PEDIDOS PARA ENCONTRAR A ÁREA</p>
              <div class="form-group row">
                <label for="base" class="col-sm-2 col-form-label">Lado maior:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="lado maior" id="ladomaior">
                </div>
              </div>
              <label for="base" class="col-sm-2 col-form-label">Lado menor:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="lado menor" id="ladomenor">
              </div>
              <img src="images/areatrapezio.png" alt="" class="trapezio">
              <div class="form-group row">
                <label for="altura" class="col-sm-2 col-form-label">Altura:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" placeholder="Altura" id="altura">
                  <input type="button" value="Calcular" onclick="calcularAreaTrapezio();return true"/>
                </div>
              </div>
              <div class="resultado">
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Área</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="area" name="area">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <h5>Material Retirado de:</h5>
      <p> OLIVEIRA, Naysa Crystine Nogueira. "Área do trapézio"; Brasil Escola. Disponível em http://brasilescola.uol.com.br/matematica/area-trapezio.htm. Acesso em 28 de novembro de 2017. </p>
<?php
  include_once "footer.php";
