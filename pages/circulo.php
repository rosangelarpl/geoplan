<?php
$section_title = 'As Figuras';
$section_subtitle = 'Círculo';
include_once "section_header.php";
include_once "section_nav.php";
?>

<!-- Article section -->
<div class="spad">
  <div class="container box">

    <?php include_once "salvar_pagina.php"; ?>
    
    <div class="section-title dark">
      <h2>Círculo</h2>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2 class="post-title">O que é um Círculo?</h2>
        <p> A definição de círculo está intimamente ligada à definição de circunferência. Um círculo é um conjunto de pontos resultantes da união de uma circunferência com todos os seus pontos internos. Desse modo, ao preencher uma piscina circular de água, por exemplo, a borda dessa piscina e a superfície da água compõem um círculo. Uma circunferência, por sua vez, é um conjunto de pontos no plano equidistantes a outro ponto fixo do mesmo plano. Isso quer dizer que, dado um ponto fixo C (ponto que permanece no mesmo local, sem se movimentar), qualquer ponto que possua uma distância r do ponto C pertence à circunferência.</p>
        <p>Para construir uma circunferência, basta tomar uma corda de comprimento r, fixar uma de suas pontas em um ponto fixo e, com a ponta livre da corda, traçar a curva formada por um movimento que a mantenha esticada. Se a corda não estiver esticada, a distância entre suas extremidades será menor que r. A figura obtida com essa experiência seria a seguinte:</p>
        
        <img src="images/areacir1.jpg" alt="" class="circulo1">
        
        <p>Tendo em mente que a circunferência é um conjunto de pontos distantes de um ponto fixo, o que acontece com os pontos que possuem distâncias menores do que r? A resposta para essa pergunta pode ser encontrada na definição de círculo:</p>
        
        <h2 class="post-title pt-5">Definição de círculo</h2>

        <p>Círculo é a união de uma circunferência com todos os pontos internos a ela. Em outras palavras, a circunferência é apenas o contorno de um círculo. Dessa maneira, a distância entre o centro e um ponto qualquer de um círculo é sempre menor ou igual a r.</p>
  
        <img src="images/exemplodecirculo.jpg" alt="" class="circulo2">
        
        <p>Para o círculo valem todas as propriedades de raio, diâmetro e cordas de uma circunferência. Além dessas propriedades, os círculos são divididos em dois conjuntos de pontos iguais, chamados de semicírculos, por um diâmetro qualquer. Com relação aos pontos, qualquer ponto A em que a distância de A até O, representada por d (A,O), é igual ao raio é chamado de ponto da circunferência. Qualquer ponto B em que d(B,O) é menor que o raio é chamado de ponto interno à circunferência. Nesses dois casos, os pontos pertencem ao círculo. Por fim, qualquer ponto C em que d(C,O) é maior que o raio é chamado de ponto externo à circunferência.</p>
        <p>Povos antigos já conheciam medidas envolvendo círculos e circunferências. Alguns deles mediam uma circunferência e dividiam o valor encontrado pelo comprimento do diâmetro dela. Qualquer tentativa desse experimento tinha um número fixo como resultado: aproximadamente 3,14. Foram poucas as tentativas desse cálculo para notar que esse valor é encontrado sempre, independentemente da circunferência. Dessa forma, sendo C o comprimento da circunferência e d o seu diâmetro, temos:</p>
        <p class="formula">C/d=3,14</p>
        <p>Sabendo que o diâmetro de uma circunferência é igual a duas vezes o seu raio (d = 2r), pode-se substituir a expressão acima da seguinte maneira:</p>
        <p class="formula">C/2=3,14</p>
        <p>Hoje se sabe que o número resultante dessa divisão é um número irracional (com infinitas casas decimais). Portanto, utilizando a letra grega π (leia pi) para representar esse número, a fórmula para calcular o comprimento de uma circunferência é dada por:</p>
        <p class="formula">C = 2.π.r</p>
        <p>Essa também é a fórmula utilizada para calcular o perímetro do círculo, uma vez que perímetro do círculo e circunferência são a mesma coisa. Quanto ao cálculo de área de um círculo, ele é dada pela seguinte expressão:</p>
        <p class="formula">A = π.r^2</p>
        <p>Uma vez dito isso, é mais correto afirmar que o cálculo de área é feito apenas no círculo ou que a área a ser calculada é delimitada por uma circunferência. Contudo, é comum encontrar exercícios e problemas cujas propostas de cálculo são para área da circunferência.</p>

         <h2 class="post-title text-center pt-5">calcular Área do Círculo</h2>

          <div id="login" class="login-page">
            <div class="form">
              <form class="login-form">
                <input type="text" placeholder="Raio" id="raio"/>
                <button type="button" value="Calcular" class="site-btn btn-2 mb-3" onclick="calcularAreaCirculo();return true"/>Calcular</button>
                <input type="text" id="area" name="area" placeholder="Resultado">
              </form>
            </div>
          </div>



      </div>
    </div>

  </div>
</div>
<!-- article section end -->

<?php
include_once "comentario.php";

