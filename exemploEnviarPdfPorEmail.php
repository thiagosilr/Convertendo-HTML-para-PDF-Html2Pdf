<?php
# Aqui incluímos a classe html2pdf.
include('html2pdf/html2pdf.class.php');
# Aqui incluímos a classe PHPMailer.
include('phpMailer/PHPMailerAutoload.php');

# Html que irá ser convertido.
$html = '
<link rel="stylesheet" type="text/css" href="css/exemploPdf.css" />
 
<div id="logo"></div>
<span id="texto">HTML2PDF</span>';
 
# Converte o HTML para PDF e envia por e-mail.
try
{
    $arquivo = 'C:\exemploEnviarPdfPorEmail.pdf';


    $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8', 2);
     
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($html); 
     
    /* Exibe o PDF:
     * 1º parâmetro: Nome do arquivo PDF. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
                     I: Abre o PDF gerado no navegador. 
                     D: Abre a janela para você realizar o download do PDF. 
                     F: Salva o PDF em alguma pasta do servidor. */
    $html2pdf->Output($arquivo, 'F');


    # Envia e-mail com o PDF em anexo
    $mail = new PHPMailer;

    $mail->isSMTP();                      # Informa que será utilizado SMTP
    $mail->Host = 'smtp.gmail.com';       # SMTP host
    $mail->SMTPAuth = true;               # Ativa autenticação SMTP
    $mail->Username = 'email@gmail.com';  # SMTP usuário
    $mail->Password = '*******';          # SMTP senha
    $mail->SMTPSecure = 'tls';            # Ativa TLS
    $mail->Port = 587;                    # SMTP porta

    $mail->setFrom('remetente@gmail.com', 'Thiago Silva');    # Remetente
    $mail->addAddress('destinatario@gmail.com', 'Thiago Resende'); # Destinatário

    $mail->addAttachment($arquivo); # Anexo
    $mail->isHTML(true);

    $mail->Subject = 'HTML para PDF enviado por e-mail'; # Título
    $mail->Body    = 'Segue PDF em anexo.';              # Mensagem

    if(!$mail->send()) {
        echo 'Não foi possível enviar o e-mail:' . $mail->ErrorInfo;
    } else {
        echo 'E-mail enviado com sucesso.';
    }
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}
