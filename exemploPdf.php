<?php
# Aqui inclu�mos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
 
$html = '
<link rel="stylesheet" type="text/css" href="exemploPdf.css" />
 
<div id="logo"></div>
<span id="texto">HTML2PDF</span>

<table id="table100" border="1">
	<tr>
		<td style="width:20%">Table com width</td>
		<td style="width:80%">100%</td>
	</tr>
</table>';
 
# Converte o html para pdf.
try
{
    $html2pdf = new HTML2PDF('P','A4','pt', false, 'ISO-8859-15', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o pdf:
     * 1� par�metro: Nome do arquivo pdf. O nome que voc� quer dar ao pdf gerado. 
     * 2� par�metro: Tipo de sa�da: 
                     I: Abre o pdf gerado no navegador. 
                     D: Abre a janela para voc� realizar o download do pdf. 
                     F: Salva o pdf em alguma pasta do servidor. */
    $html2pdf->Output('exemploPdf.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}
?>