
<?php
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = "<style>
        .div_padding_questions{
            padding: 5px;
            border: 1px solid black;
            margin: 10px 0px 10px 0px;
        }
        
        .answers{
            text-indent: 1em;
            color: green;
        }
        .info_final{
            float: right;
        } 
        
        </style>";
foreach ($form as $forms){
    $form_name = $forms->title;
    $data = date('d/m/Y', strtotime($forms->initial_date));
    
}
$html .= "<center><h1><span>$form_name</span></h1><br>ID_Usuário: $user_id<h2>Respostas</h2></center>";


    foreach($question as $questions){
    
    if($questions->type == 'Text'){               
        $html .= "
            <div class='div_padding_questions'>
                    
            <div class='input-group'>
                <b>$questions->order - $questions->title</b>
                <input type='hidden' name='question_id[]' value='{{$questions->id}}'>
            </div>";
                    
        foreach ($questions->answers as $answers){
            $html .= "<p class='answers'>R: $answers->answer</p>";          
        }
        $html .= "</div>";
    }
                
    elseif ($questions->type == 'Mult'){
        $html .= "
            <div class='div_padding_questions'>
                <b>$questions->order - $questions->title</b>";
        
        foreach ($questions->answers as $answers){
            $html .= "<p class='answers'>R: $answers->answer</p>";          
        }
        $html .= "</div>";       
    }
    
    elseif ($questions->type == 'Check'){
        $html .= "
            <div class='div_padding_questions'>
            <b>$questions->order - $questions->title</b>";
        
        foreach ($questions->answers as $answers){
            $html .= "<p class='answers'>R: $answers->answer</p>";          
        }
        $html .= "</div>";        
        $html .= "<span class='info_final'>Formulário criado em: $data</span>";        
    }
}

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Respostas_$form_name", array("Attachment" => false)); 

?>
