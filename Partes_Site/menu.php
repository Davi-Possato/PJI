<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/menu.css">
</head>
<body>
<nav class="nav">
	<ul>
		<li class="drop"><a href="./parts/formCarro.php">Form Carro</a>
    <li class="drop"><a href="./parts/formVendedor.php">Form Vendedor</a>
    <li class="drop"><a href="./parts/formCliente.php">Form Cliente</a>
			<!--<ul class="dropdown">
				<li><a href="./parts/formCliente.php">Novos</a></li>
				<li><a href="./parts/formVendedor.php">Seminovos</a></li>
				<li><a href="./parts/formCarro.php">Usados</a></li>
			</ul>-->
		</li>
    <li><a href="./Classes/formCarro.php">Vender</a>
	</ul>
</nav>
<script>
  $(".drop")
  .mouseover(function() {
  $(".dropdown").show(300);
  });
  $(".drop")
  .mouseleave(function() {
  $(".dropdown").hide(300);     
  });
</script>
</body>
</html>