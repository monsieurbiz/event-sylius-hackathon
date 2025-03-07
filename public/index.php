<?php

use Symfony\Component\Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';

(new Dotenv())->loadEnv(__DIR__.'/../.env');

$body = file_get_contents('../README.html');
$body = strtr($body, [
    '{{WEEZEVENT_MODULE}}' => $_ENV['WEEZEVENT_MODULE'] ?? '',
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sylius Hackathon</title>
    <meta name="description" content="" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="github-markdown.css">
    <style>
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
        }

        @media (max-width: 767px) {
            .markdown-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="markdown-body">
        <?php echo $body; ?>
        <script type="text/javascript" src="//mautic.monsieurbiz.com/form/generate.js?id=2"></script>
    </div>

    <script type="text/javascript" src="https://widget.weezevent.com/weez.js"  async defer></script>
</body>
</html>
