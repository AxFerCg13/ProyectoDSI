<?php
        require('fpdf.php'); // Se invoca a la libreria
        $pdf = new FPDF('L', 'mm', 'A4'); // Se genera un constructor para poder definir orientacion, unidad y el tamaño 
        //1. parametro - orientacion: 'P' o 'L'
        //2. unidad de medida de usuario. Por defecto se usa el milimetro.
        //3. Tamaño de la hoja- Por defecto el A4, son las medidas de una hoja.
        $pdf->AddPage('P', 'A4', 0); // Añade una pagina, puede llevar tres parametros. Tiene valores por defecto
        //1. Orientación sino toma el valor por defecto del constructir
        //2. Tamaño de hoja
        //3.Rotacion en multiplos de 90 grados
        $pdf->SetFont('Arial','B',12); //Siempre se debe definir una fuente. 
        //1. Tipo de fuente - familia
        //2. Estilo de la fuente
        //3. Tamaño de la fuente 12 es el valor por default
        $pdf->Cell(80,10,'¡Hola, Mundo!',1,1,'C');
        //Sirve para movernos dentro de la imagen
        $pdf->SetXY(100,100);
        $pdf->Cell(80,10,'¡Hola, Mundo!',1,1,'C');
        //Sirve para colocar los elementos 
        //1.Ancho
        //2. Alto
        //3. Texto que se va a imprimir
        //4. Si tiene borde o no
        //5. salto de linea o no con ln
        //6. Alineación para centrar el texto, 0 valor porfecto
        $pdf->Image('prueba.jpg',90,90,90,90);
        $pdf->Output(); // Sirve para mandar el archivo a un determinado destino
        // En la documentacion viene los parametros que se le pueden mandar
        

?>