<?php
require_once('html2pdf\_tcpdf_5.0.002\tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

# Configuração de margens.
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage();
$pdf->setEqualColumns(2, 90); # Quantidade de colunas e largura das colunas
$pdf->selectColumn();

$texto = '
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ipsum mauris, interdum nec maximus sed, condimentum ut massa. Proin consequat, nunc sed ultrices eleifend, erat est posuere diam, dignissim posuere sem diam <b>eget</b> metus. Pellentesque dignissim non dolor sed malesuada. Vestibulum bibendum dapibus quam, eget lacinia sapien suscipit interdum. Morbi ac ultrices ex. Phasellus vitae tincidunt diam, porta mattis mauris. In sagittis nibh in risus porttitor mattis. Duis pellentesque id quam eu egestas. Duis non blandit urna, ut luctus est. Donec felis dui, congue at scelerisque sit amet, suscipit varius velit. Curabitur imperdiet nisi nec sagittis pharetra.

Cras posuere pellentesque dui, eu euismod ipsum efficitur vitae. Ut fringilla eu lorem mattis tincidunt. Suspendisse et dolor quis dui vestibulum vestibulum. Fusce et lorem vulputate, aliquet tellus nec, vestibulum tortor. Nulla placerat ut erat in pretium. Praesent fringilla efficitur mattis. Nullam id venenatis risus, vitae commodo risus. Aenean consequat est ante, et laoreet nulla porttitor vitae. Donec in arcu laoreet, fringilla mi sit amet, consequat diam. Phasellus eu maximus nisi. Etiam lobortis rhoncus gravida.

Donec nisi sem, congue nec vehicula quis, tincidunt vitae nibh. Quisque a dolor eleifend, ullamcorper metus vel, egestas ipsum. Pellentesque finibus sapien id arcu pellentesque, a egestas felis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna ligula, rhoncus eu nisl a, bibendum volutpat nibh. Nulla at libero velit. Nam orci mauris, pellentesque sit amet tristique a, porta sit amet quam. In blandit condimentum fringilla. Donec auctor commodo mi sed porta. Vestibulum ac diam risus. In tincidunt lectus eget ligula condimentum convallis. Quisque lectus mi, lacinia in maximus non, semper vel est.

Integer nec mattis enim. Nullam consequat rhoncus neque, id luctus diam posuere ac. Nullam auctor laoreet felis, pellentesque suscipit tellus scelerisque ac. Aliquam id gravida mauris, a tristique augue. Aliquam blandit vitae urna eget venenatis. Vestibulum id pharetra nisi. Nulla ipsum arcu, egestas vitae velit et, scelerisque accumsan eros. Pellentesque at magna est. Duis laoreet, nisl et sollicitudin ornare, orci metus cursus ex, ut pulvinar arcu urna et lacus.

Vivamus sollicitudin eu ipsum tincidunt finibus. Donec purus augue, hendrerit eget suscipit vitae, venenatis porta leo. Sed suscipit ligula eu augue vestibulum, in malesuada odio hendrerit. Proin quis purus hendrerit, rhoncus lacus ac, aliquam nibh. Suspendisse pulvinar dui ex. Proin et porttitor velit. Pellentesque at metus ex. In sed maximus nisl, eget mollis diam. Cras justo est, euismod et ullamcorper eu, efficitur quis est. Sed mattis sem mollis urna pretium rutrum.

Donec nisi sem, congue nec vehicula quis, tincidunt vitae nibh. Quisque a dolor eleifend, ullamcorper metus vel, egestas ipsum. Pellentesque finibus sapien id arcu pellentesque, a egestas felis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna ligula, rhoncus eu nisl a, bibendum volutpat nibh. Nulla at libero velit. Nam orci mauris, pellentesque sit amet tristique a, porta sit amet quam. In blandit condimentum fringilla. Donec auctor commodo mi sed porta. Vestibulum ac diam risus. In tincidunt lectus eget ligula condimentum convallis. Quisque lectus mi, lacinia in maximus non, semper vel est.

Integer nec mattis enim. Nullam consequat rhoncus neque, id luctus diam posuere ac. Nullam auctor laoreet felis, pellentesque suscipit tellus scelerisque ac. Aliquam id gravida mauris, a tristique augue. Aliquam blandit vitae urna eget venenatis. Vestibulum id pharetra nisi. Nulla ipsum arcu, egestas vitae velit et, scelerisque accumsan eros. Pellentesque at magna est. Duis laoreet, nisl et sollicitudin ornare, orci metus cursus ex, ut pulvinar arcu urna et lacus.

Vivamus sollicitudin eu ipsum tincidunt finibus. Donec purus augue, hendrerit eget suscipit vitae, venenatis porta leo. Sed suscipit ligula eu augue vestibulum, in malesuada odio hendrerit. Proin quis purus hendrerit, rhoncus lacus ac, aliquam nibh. Suspendisse pulvinar dui ex. Proin et porttitor velit. Pellentesque at metus ex. In sed maximus nisl, eget mollis diam. Cras justo est, euismod et ullamcorper eu, efficitur quis est. Sed mattis sem mollis urna pretium rutrum.
Donec nisi sem, congue nec vehicula quis, tincidunt vitae nibh. Quisque a dolor eleifend, ullamcorper metus vel, egestas ipsum. Pellentesque finibus sapien id arcu pellentesque, a egestas felis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris urna ligula, rhoncus eu nisl a, bibendum volutpat nibh. Nulla at libero velit. Nam orci mauris, pellentesque sit amet tristique a, porta sit amet quam. In blandit condimentum fringilla. Donec auctor commodo mi sed porta. Vestibulum ac diam risus. In tincidunt lectus eget ligula condimentum convallis. Quisque lectus mi, lacinia in maximus non, semper vel est.

Integer nec mattis enim. Nullam consequat rhoncus neque, id luctus diam posuere ac. Nullam auctor laoreet felis, pellentesque suscipit tellus scelerisque ac. Aliquam id gravida mauris, a tristique augue. Aliquam blandit vitae urna eget venenatis. Vestibulum id pharetra nisi. Nulla ipsum arcu, egestas vitae velit et, scelerisque accumsan eros. Pellentesque at magna est. Duis laoreet, nisl et sollicitudin ornare, orci metus cursus ex, ut pulvinar arcu urna et lacus.

Vivamus sollicitudin eu ipsum tincidunt finibus. Donec purus augue, hendrerit eget suscipit vitae, venenatis porta leo. Sed suscipit ligula eu augue vestibulum, in malesuada odio hendrerit. Proin quis purus hendrerit, rhoncus lacus ac, aliquam nibh. Suspendisse pulvinar dui ex. Proin et porttitor velit. Pellentesque at metus ex. In sed maximus nisl, eget mollis diam. Cras justo est, euismod et ullamcorper eu, efficitur quis est. Sed mattis sem mollis urna pretium rutrum.';

$pdf->writeHTML($texto, true, false, true, false, 'J');
$pdf->Output('exemplo.pdf', 'I');