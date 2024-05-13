<?php


// proprietà e metodi dichiarati come private

// class Banca
// {
//     private $saldo;

//     public function __construct($saldo_iniziale)
//     {
//         $this->saldo = $saldo_iniziale;
//     }

//     public function deposito($importo)
//     {
//         $this->saldo += $importo;
//     }

//     public function prelievo($importo)
//     {
//         if ($importo <= $this->saldo) {
//             $this->saldo -= $importo;
//             return $importo;
//         } else {
//             return "Saldo insufficiente.";
//         }
//     }

//     public function getSaldo()
//     {
//         return $this->saldo;
//     }
// }

// // Creazione di un oggetto di tipo Banca
// $conto = new Banca(1000);

// // Tentativo di accesso diretto a una proprietà privata (genererà un errore)
// // echo $conto->saldo;

// // Utilizzo dei metodi pubblici per depositare e prelevare fondi
// $conto->deposito(500);
// echo $conto->getSaldo(); // Output: 1500

// echo $conto->prelievo(700); // Output: 700
// echo $conto->getSaldo(); // Output: 800

// echo $conto->prelievo(1000); // Output: Saldo insufficiente.

class Form
{
    private $action;
    private $method;
    private $fields = []; // array dove vengono raggruppati tutti i valori dei campi


    // funzione costruisce le proprietà del form
    public function __construct($action = "", $method = "POST")
    {
        $this->action = $action;
        $this->method = $method;
    }

    // funzione che costruisce la funzione che aggiunge i campi (creando i parametri da passare e assegnandogli il valore base)
    public function addField($name, $type = "text", $label = "", $placeholder = "", $attributes = [])
    {
        // creazione dell'array associativo a indice name
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