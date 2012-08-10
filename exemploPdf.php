<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
 
$html = '
<link rel="stylesheet" type="text/css" href="css/style.css" />
 
<div id="logo"></div>
<span id="texto">HTML2PDF</span>

<table id="table100" border="1">
	<tr>
		<td style="width:20%">Table com width</td>
		<td style="width:80%">100%</td>
	</tr>
</table>

<!-- Imagem gerada dinamicamente -->
<img src="http://localhost/Convertendo-HTML-para-PDF-Html2Pdf/img/imagemJpegDinamica.php?cor=1" />';
 
# Converte o html para pdf.
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'pt', false, 'ISO-8859-15', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o pdf:
     * 1º parâmetro: Nome do arquivo pdf. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
                     I: Abre o pdf gerado no navegador. 
                     D: Abre a janela para você realizar o download do pdf. 
                     F: Salva o pdf em alguma pasta do servidor. */
    $html2pdf->Output('exemploPdf.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}
