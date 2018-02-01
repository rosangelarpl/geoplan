<?php
session_start();
include_once "header.php";
$pag = "index";
include_once "classes/banco.php";

if (!empty($_SESSION["usuario"])) {

if(!empty($_POST)) {
  try{
    $insere_perfil = "insert into salva_pagina (id_usuario, pagina) values (?, ?)";
    $query = Banco::instanciar()->prepare($insere_perfil);
    $query->bindValue(1, $_SESSION["usuario"]["id"]);
    $query->bindValue(2, $pag);
    $query->execute();
  } catch (PDOException $e) {

  }
}
$encontra_paginas = "select pagina from salva_pagina where id_usuario = ? and pagina = ?";
$query = Banco::instanciar()->prepare($encontra_paginas);
$query->bindValue(1, $_SESSION["usuario"]["id"]);
$query->bindValue(2, $pag);
$query->execute();
$pagina = $query->fetch(Banco::FETCH_ASSOC);
if ($pagina["pagina"] !== $pag) {
?>
<form method="post" action="index.php">
  <input type="hidden" value="-" name="-"/>
  <button type="submit" class="btn btn-primary btn-custom pull-right" id="salva">
  <span class="glyphicon glyphicon-star img-circle btn-icon"></span>
  Salvar Página</button>
</form>
<?php } else { ?>
  <a href="#" class="btn btn-secondary active btn-custom pull-right" id="salva">
  <span class="glyphicon glyphicon-heart img-circle btn-icon"></span>
  Página Salva</a>
<?php } ?>
<?php } ?>
      <div class="row">
      <h2> A Geometria Plana </h2>
    <p>A geometria plana ou euclidiana é a parte da matemática que estuda as figuras que não possuem volume. A geometria plana também é chamada de euclidiana, uma vez que seu nome representa uma homenagem ao geômetra Euclides de Alexandria, considerado o “pai da geometria”.
      Curioso notar que o termo geometria é a união das palavras “geo” (terra) e “metria” (medida); assim, a palavra geometria significa a "medida de terra".</p>
      <h3>1. Breve histórico</h3>
      <p> O conhecimento geométrico como conhecemos hoje nem sempre foi assim. A geometria surgiu de forma intuitiva, e como todos os ramos do conhecimento, nasceu da necessidade e da observação humana. O seu início se deu forma natural através da observação do homem à natureza. Ao arremessar uma pedra num lago, por exemplo, observou-se que ao haver contato dela com a água, formavam-se circunferências concêntricas – centros na mesma origem. Para designar esse tipo de acontecimento surgiu a Geometria Subconsciente. Conhecimentos geométricos também foram necessários aos sacerdotes. Por serem os coletores de impostos da época, a eles era incumbida a demarcação das terras que eram devastadas pelas enchentes do Rio Nilo. A partilha da terra era feita diretamente proporcional aos impostos pagos. Enraizada nessa necessidade puramente humana, nasceu o cálculo de área. </p>
      <p>Muitos acontecimentos se deram, ainda no campo da Geometria Subconsciente, até que a mente humana fosse capaz de absorver propriedades das formas antes vistas intuitivamente. Nasce com esse feito a Geometria Científica ou Ocidental. Essa geometria, vista nas instituições de ensino, incorpora uma série de regras e sequências lógicas responsáveis pelas suas definições e resoluções de problemas de cunho geométrico. Foi em 300 a.C. que o grande geômetra Euclides de Alexandria desenvolveu grandiosos trabalhos matemático-geométricos e os publicou em sua obra intitulada Os Elementos. Essa foi, e continua sendo, a maior obra já publicada - desse ramo - de toda a história da humanidade.  A Geometria plana, como é popularmente conhecida nos dias atuais, leva também o título de Geometria Euclidiana em homenagem ao seu grande mentor Euclides de Alexandria.
      </p>

      <h2> Figuras Planas </h2>
      <p>Uma figura plana nada mais é que um plano que possui uma forma específica e para que ela exista é preciso que tenha no mínimo três lados. Todas essas formas geométricas definidas como Figuras Planas possuem fórmulas matemáticas  para o cálculo da medida de seus perímetros e de suas superfícies (ou áreas).</p>
      <h3>1. Perímetro – Definição e cálculo</h3>
      <p> o perímetro de uma figura plana representa a soma de todas as medidas de seus lados. Observe a figura abaixo. Ela representa uma figura plana de quatro lados (portanto é um quadrilátero) denominado trapézio.</p>
      <img src="images/img_02_aula1_fmt.jpeg" alt="trapézio comum" class="trapezio1"/>
      <p>Nela observa-se que as medidas de seus lados valem 15 cm, 5 cm, 9 cm e 5 cm. Assim, calcula-se seu perímetro somando 15 + 5 + 9 + 5 = 34 cm.</p>
      <p class="obs"> Observe que o perímetro é uma grandeza cuja unidade de medida é a de comprimento e, portanto, pode ser medido em metros ou em seus múltiplos e submúltiplos.</p>
      <h3>2. Definição de Área</h3>
      <p>Área é um conceito matemático que pode ser definida como quantidade de espaço bidimensional, ou seja, de superfície. Existem várias unidades de medida de área, sendo a mais utilizada o metro quadrado (m²) e os seus múltiplos e sub-múltiplos. Cada figura possui uma fórmula diferente para calcular a área.</p>
      <p>Clique nas figuras a seguir para obter mais informações sobre cada uma delas.</p>
</div>
<?php
  include_once "footer.php";
