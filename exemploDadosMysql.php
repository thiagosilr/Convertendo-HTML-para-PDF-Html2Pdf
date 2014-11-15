<?php
/*
-- Tabela exemplo
CREATE TABLE IF NOT EXISTS `pessoas` (
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`nome`) VALUES
('Thiago'),
('Edna');
*/

# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');

# Conexão mysql
$host    = 'localhost';
$usuario = 'root';
$senha   = 'root';
$bancoDados = 'test';
$conect = mysql_connect($host, $usuario, $senha);
$db = mysql_select_db($bancoDados);

# Realiza consulta no banco de dados.
$pessoas = mysql_query('SELECT nome FROM pessoas');

# Monta o HTML dinamicamente com os dados retornados da consulta.
$html = '
<table border="1">
    <tr>
        <td>Nome</td>
    </tr>';

    while ($pessoa = mysql_fetch_array($pessoas))
    {
        $html .= '
        <tr>
            <td>'.$pessoa['nome'].'</td>
        </tr>';
    }

$html .='
</table>';
 
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
    $html2pdf->Output('exemploDadosMysql.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
    echo $e; 
}
