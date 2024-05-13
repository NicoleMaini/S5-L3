<?php

class Form
{
    private $html = '';
    private $method;
    private $action;

    public function __construct($method, $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function addLabel($type, $id)
    {
        $this->html .= "<label for='$id' class='control-label'>$type:</label><br>";
    }

    public function addInput($type, $name, $value, $id)
    {
        $this->html .= "<input type='$type' name='$name' value='$value' id='$id' class='form-control'><br>";
    }

    public function render()
    {
        echo "<form method='{$this->method}' action='{$this->action}'  class='form-horizontal'>";
        echo $this->html;
        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
        echo "</form>";
    }
}

$myForm = new Form('POST', 'action.php');

$myForm->addLabel('Name', 'id-for1');
// "<input type='text' name='name' value='' id='id-for1'><br>"
$myForm->addInput('text', 'name', '', 'id-for1');

$myForm->addLabel('Surname', 'id-for2');
$myForm->addInput('text', 'surname', '', 'id-for2');

$myForm->addLabel('Email', 'id-for3');
$myForm->addInput('text', 'Email', '', 'id-for3');

$myForm->addLabel('Leave message', 'id-for4');
$myForm->addInput('textarea', 'message', '', 'id-for4');
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
            <?php $myForm->render(); ?>
        </div>
    </div>
</body>

</html>