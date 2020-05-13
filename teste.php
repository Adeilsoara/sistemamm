<?php
require('vendor/setasign/fpdf/fpdf.php');
//FONTE: http://henriquecorrea.com/news/Relatorios_em_PDF_com_PHP_usando_a_classe_FPDF
class PDF extends FPDF {
function Header() {
	global $codigo; // EXEMPLO DE UMA VARIAVEL QUE TERÁ O MESMO VALOR EM QUALQUER ÁREA DO PDF.
        $l=5; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA
        $this->SetXY(10,10); // SetXY - DEFINE O X E O Y NA PAGINA
        $this->Rect(10,10,190,280); // CRIA UM RETÂNGULO QUE COMEÇA NO X = 10, Y = 10 E 
                                    //TEM 190 DE LARGURA E 280 DE ALTURA. 
                                    //NESTE CASO, É UMA BORDA DE PÁGINA.

        $this->Image('logomm.jpeg',11,11,20); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.
        $this->SetFont('Arial','B',8); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8

       // $this->Cell(170,15,'INSIRA SEU TEXTO AQUI',0,0,'L'); 
        
       	//$this->Cell(20,$l,'Nº '.$codigo,1,0,'C',0); 
        // CRIA UMA CELULA DA MESMA FORMA ANTERIOR MAS COM ALTURA DEFINIDA PELA VARIAVEL $l E 
        // INSERINDO UMA VARIÁVEL NO TEXTO.
        $this->Ln(); // QUEBRA DE LINHA

        $this->Cell(190,10,'',0,0,'L');
        $this->Ln();
        $l = 17;
        $this->SetFont('Arial','B',12);
        $this->SetXY(10,15);
        $this->Cell(190,$l,'Candidatos Classificados	','B',1,'C');
      
        $l=5;
        $this->SetFont('Arial','B',10);
        $this->Cell(20,$l,'Candidatos:',0,0,'L');
        $this->Cell(100,$l,'','B',0,'L');
        $this->Cell(35,$l,'',0,0,'L');
        $this->Cell(15,$l,'Data:',0,0,'L');
        $this->Cell(20,$l,date('d/m/Y'),'B',0,'L'); // INSIRO A DATA CORRENTE NA CELULA

        $this->Ln();
        
        $this->Ln();
 
       
        $this->Cell(190,2,'',0,0,'C'); 
        //ESPAÇAMENTO DO CABECALHO PARA A TABELA
        $this->Ln();

        $this->SetTextColor(255,255,255);
        $this->Cell(190,$l,utf8_decode('Classificados Informática'),1,0,'C',1);
        $this->Ln();
     
       	//TITULO DA TABELA DE SERVIÇOS
        $this->SetFillColor(232,232,232);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','B',8);
        $this->Cell(100,$l,'Nome ',1,0,'L',1);
        $this->Cell(31,$l,'Curso',1,0,'l',1);
        $this->Cell(20,$l,utf8_decode('Média Final'),1,0,'L',1);
        /*$this->Cell(12,$l,'Titulo 4',1,0,'C',1);
        $this->Cell(12,$l,'Titulo 5',1,0,'C',1);
        $this->Cell(40,$l,'Titulo 6',1,0,'C',1);
        $this->Cell(15,$l,'Titulo 7',1,0,'C',1);*/
        $this->Ln();

 }

 // Page footer
function Footer() {
    	$this->SetXY(15,280);
       // $this->Rect(10,270,190,20);
        $this->SetFont('Arial','',10);
        
        $this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(190,7,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
   
 }
}
include 'conexao.php';
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$y = 54;

$sql = "SELECT nome, curso, round(sum(((fisica)+(historia)+(portugues)+(matematica))/4),2 ) AS media FROM ALUNO AS a INNER JOIN NOTAS AS n ON (a.idaluno = n.idnotas) where curso like 'Info%' group by idaluno ORDER BY media DESC";
$result = mysqli_query($connection, $sql);
$l = 5;
while ($row = mysqli_fetch_array($result)) {
	$dados1 = utf8_decode($row['0']);
	$dados2 = utf8_decode($row['1']);
	$dados3 = $row['2'];
	/*$dados4 = $row['3'];
	$dados5 = $row['4'];
	$dados6 = $row['5'];*/

	//$l = 5 * contaLinhas($dados2,48);

	if($y + $l >= 230){           

        $pdf->AddPage();   
        $y=59;             

    }

 
    $pdf->SetY($y);
    $pdf->SetX(10);
    $pdf->Rect(10,$y,100,$l);
    $pdf->MultiCell(51,6,$dados1,0,10);
    $pdf->SetY($y);
    $pdf->SetX(110);
    $pdf->Rect(110,$y,31,$l);
   // $pdf->Rect(51,$y,10,$l);
    $pdf->MultiCell(30,5,$dados2,0,2);
    $pdf->SetY($y);
    $pdf->SetX(141);
    $pdf->Rect(141,$y,20,$l);
    $pdf->MultiCell(12,6,$dados3,0,2);
    /*$pdf->SetY($y);
    $pdf->SetX(133);
    $pdf->Rect(133,$y,12,$l);
    $pdf->MultiCell(12,6,$dados4,0,2,'C');
    $pdf->SetY($y);
    $pdf->SetX(145);
    $pdf->Rect(145,$y,40,$l);
    $pdf->MultiCell(40,6,$dados5,0,2,'C');
    $pdf->SetY($y);
    $pdf->SetX(145);
    $pdf->Rect(145,$y,40,$l);
    $pdf->MultiCell(40,6,$dados6,0,2,'C');*/
    
    $y += $l;
}
mysqli_close();
$pdf->Output();
?>