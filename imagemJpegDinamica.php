<?php
header('Content-type:image/jpeg');

# Cria uma imagem com 200 de largura e 200 de altura.
$img = imagecreate(200, 200);

if ($_GET['cor'] == 1)
{
	# Deixo o fundo com a cor azul.
	$azul = imagecolorallocate($img, 0, 0, 255);
}
else
{
	# Deixo o fundo com a cor verde.
	$verde = imagecolorallocate($img, 0, 255, 0);
}

# Imprime a imagem na tela.
imagejpeg($img);

# Retira a imagem da memória
imagedestroy($img);
