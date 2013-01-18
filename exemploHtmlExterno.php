<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');

# Obtem o HTML de uma página externa.
$html = file_get_contents('http://localhost/Convertendo-HTML-para-PDF-Html2Pdf/html/htmlExterno.php?id=123');
 
# Converte o HTML para PDF.
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o PDF:
     * 1º parâmetro: Nome do arquivo PDF. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
                     I: Abre o PDF gerado no navegador. 
                     D: Abre a janela para você realizar o download do PDF. 
                     F: Salva o PDF em alguma pasta do servidor. */
    $html2pdf->Output('exemploHtmlExterno.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}
