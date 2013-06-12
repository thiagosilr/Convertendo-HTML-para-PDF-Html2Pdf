<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
 
/* Guardamos na variável $html o html que queremos converter.
 * Linha 16 - Incluímos o nosso arquivo css (exemploPdf.css)
 * 
 * Para quebrar a página, basta envolver o conteúdo pretendido entre as tags <page></page>.
 * Linha 18 - Configuramos apartir de onde o conteúdo irá começar, no caso 10mm topo, rodapé, esquerda e direita.
 * Linha 19 - Informações que aparecem no topo da página.
 * Linha 22 - Informações que aparecem no rodapé da página, no caso o número da página e o total de páginas.
 * Linha 28 - Nova página que herda as configurações da página anterior.
 * Linha 31 - Nova página que não herda as configurações da página anterior.
 */
$html = '
<link rel="stylesheet" type="text/css" href="css/exemploPdf.css" />

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
	<page_header>
		'.date('d/m/Y').'
	</page_header>
	<page_footer>
		Página [[page_cu]]/[[page_nb]]
	</page_footer>

	Conteúdo da página.
</page>
<page pageset="old">
	<span id="texto">Nova página que herda as configurações da página anterior.</span>
</page>
<page>
	Nova página que não herda as configurações da página anterior.
</page>';


# Converte o html para pdf.
try
{
    /* Aqui estamos instanciando um novo objeto que irá criar o 
     * pdf. Então vamos aos parametros passados:
     * 1º parâmetro: Utilize “P” para exibir o documento no 
     *               formato retrato e “L” para o formato 
     *               paisagem. 
     * 2º parâmetro: Formato da folha A4, A5....... 
     * 3º parâmetro: Caso ocorra alguma exceção durante a 
     *               conversão. Em qual idioma é para 
     *               exibir o erro. No caso o idioma escolhido 
     *               foi o português “pt”. 
     * 4º parâmetro: Informe TRUE caso o html de entrada esteja
     *               no formato unicode e FALSE caso negativo. 
     * 5º parâmetro: Codificação a ser utilizada. ISO-8859-15, UTF-8 ...... 
     * 6º parâmetro: Margem do documento. Você pode informa um 
     *               único valor como no exemplo acima. 
     *               Outra forma é informa um array setando as 
     *               margens separadamente.: Exemplo: 
     * $html2pdf = new HTML2PDF(
     *   'P',
     *   'A4',
     *   'pt',
     *   false,
     *   'ISO-8859-15',
     *   array(5,5,5,8));
     * Sendo que a primeira posição do array representa a margem esquerda depois      
     * topo, direita e rodapé. */
    $html2pdf = new HTML2PDF('P','A4','pt', true, 'UTF-8', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o pdf:
     * 1º parãmetro: Nome do arquivo pdf. O nome que você quer dar ao pdf gerado. 
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
