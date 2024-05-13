<?php

// Certamente! Questo codice PHP è un esempio di come utilizzare la programmazione orientata agli oggetti (OOP) per generare un modulo HTML dinamico.
// Ecco i passaggi logici:
// 1. Definizione della classe Form: Inizia definendo una classe chiamata Form. Questa classe ha tre proprietà private: $action, $method, e $fields. Queste proprietà rappresentano l'azione del modulo (dove inviare i dati), il metodo di invio (POST o GET) e un array per memorizzare i campi del modulo.
// 2. Costruttore della classe: Viene definito un costruttore per la classe Form, che consente di specificare l'azione e il metodo del modulo. Se non vengono forniti valori, vengono usati dei valori predefiniti (azione vuota e metodo POST).
// 3. Metodo addField: Questo metodo consente di aggiungere campi al modulo. Prende in input il nome del campo, il tipo di input (testo, email, ecc.), l'etichetta del campo, il segnaposto e gli eventuali attributi aggiuntivi per il campo.
// 4. Metodo generateForm: Questo metodo genera il codice HTML per il modulo utilizzando le informazioni fornite. Crea un tag <form> con l'azione e il metodo specificati, quindi cicla attraverso i campi definiti e li aggiunge al modulo con etichette, attributi e segnaposto appropriati.
// 5. Codice HTML: Dopo la definizione della classe PHP, c'è del codice HTML che utilizza questa classe per generare un modulo. Viene istanziata un'istanza della classe Form, vengono aggiunti alcuni campi utilizzando il metodo addField, e infine viene generato e visualizzato il modulo utilizzando il metodo generateForm.
// 6. Script JavaScript e CSS Bootstrap: Infine, nel footer della pagina HTML, vengono inclusi script JavaScript e CSS di Bootstrap per lo stile e l'interattività del modulo.
// Questo codice dimostra come utilizzare la programmazione orientata agli oggetti per creare un componente riutilizzabile (il modulo) e come utilizzare PHP per generare dinamicamente codice HTML basato su input e configurazioni specifiche.


class Form
{
    private $action;
    private $method;
    private $fields = [];


    public function __construct($action = "", $method = "POST")
    {
        $this->action = $action;
        $this->method = $method;
    }


    public function addField($name, $type = "text", $label = "", $placeholder = "", $attributes = [])
    {
        $this->fields[$name] = [
            "type" => $type,
            "label" => $label,
            "placeholder" => $placeholder,
            "attributes" => $attributes,
        ];
    }

    public function generateForm()
    {
        $formHTML = '<form action="' . $this->action . '" method="' . $this->method . '" class="form-horizontal">';


        foreach ($this->fields as $name => $field) {
            $formHTML .= '<div class="form-group">';
            if (!empty($field['label'])) {
                $formHTML .= '<label for="' . $name . '" class="control-label">' . $field['label'] . '</label>';
            }
            $formHTML .= '<input type="' . $field['type'] . '" name="' . $name . '" id="' . $name . '" class="form-control"';
            if (!empty($field['placeholder'])) {
                $formHTML .= ' placeholder="' . $field['placeholder'] . '"';
            }
            foreach ($field['attributes'] as $attribute => $attrValue) {
                $formHTML .= ' ' . $attribute . '="' . $attrValue . '"';
            }
            $formHTML .= '>';
            $formHTML .= '</div>';
        }


        $formHTML .= '<button type="submit" class="btn btn-primary">Submit</button>';
        $formHTML .= '</form>';


        return $formHTML;
    }
}


// $myForm = new Form('POST', 'action');


// $myform->addLabel('text', 'id-for');
// $myForm->addInput('type', 'name', 'value', 'id-for');


// $myform->addLabel('text', 'id-for');
// $myForm->addInput('type', 'name', 'value', 'id-for');
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>


<body>
    <h1 class="text-center my-5">Generate form OOP </h1>


    <div class="container">
        <div class="col-12 col-md-6 mx-auto">




            <?php
            $form = new Form('/process.php', 'POST');
            $form->addField('nome', 'text', 'Nome', 'Enter your name');
            $form->addField('cognome', 'text', 'Cognome', 'Enter your surname');
            $form->addField('email', 'email', 'Email', 'Enter your email');
            $form->addField('message', 'textarea', 'Message', 'Enter your message', ['rows' => 4]);
            echo $form->generateForm(); ?>


        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>