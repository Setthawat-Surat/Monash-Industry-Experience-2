<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Database\StatementInterface $error
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';


if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');

?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
    <strong>SQL Query Params: </strong>
    <?php Debugger::dump($error->params) ?>
<?php endif; ?>

<?php
    echo $this->element('auto_table_warning');

    $this->end();
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 48px;
            color: #333;
        }
        p {
            font-size: 24px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        #website-logo img {
            max-width: 400px; /* Adjust as needed */
            max-height: 200px; /* Adjust as needed */
            width: auto; /* Maintain aspect ratio */
            height: auto; /* Maintain aspect ratio */
        }

    </style>
</head>
<section id="website-logo">
    <img src="<?= $this->Url->image('OrganicPrintStudioLogo.png')?>" alt="Website Logo">
</section><br><br>
<body>
 <h1><strong>Oops! The page you're looking for doesn't exist.</strong></h1>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
</p>
</body>


</html>
