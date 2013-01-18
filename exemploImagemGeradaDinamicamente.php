<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
 
$html = '
<!-- Imagem gerada dinamicamente, utilizando script php. -->
<img src="http://localhost/Convertendo-HTML-para-PDF-Html2Pdf/img/imagemJpegDinamica.php?cor=1" />';
 
# Converte o html para pdf.
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o pdf:
     * 1º parâmetro: Nome do arquivo pdf. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
                     I: Abre o pdf gerado no navegador. 
                     D: Abre a janela para você realizar o download do pdf. 
                     F: Salva o pdf em alguma pasta do servidor. */
    $html2pdf->Output('exemploImagemGeradaDinamicamente.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}
