<?php

use Symfony\Component\Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';

(new Dotenv())->loadEnv(__DIR__.'/../.env');

$hl = $_GET['hl'] ?? 'en';
switch ($hl) {
    case 'fr':
        $description = 'Rejoins-nous pour le tout premier Hackathon Sylius Hackathon à Paris!';
        $file = '../INDEX_FR.html';
        break;
    case 'en':
    default:
        $description = 'Join us for the first ever Sylius Hackathon in Paris!';
        $hl = 'en';
        $file = '../INDEX.html';
        break;
}

$body = file_get_contents($file);
$body = strtr($body, [
    '{{REGISTRATION_HTML}}' => $_SERVER['REGISTRATION_HTML' . ($hl === 'fr' ? '_FR' : '')] ?? '',
    '{{CONTACT_FORM}}' => $_SERVER['CONTACT_FORM' . ($hl === 'fr' ? '_FR' : '')] ?? '',

    // These 2 vars replacement are here because Github transforms to text the tel: schema.
    '{{PHONE_NUMBER_URL}}' => $_SERVER['PHONE_NUMBER_URL'] ?? '',
    '{{PHONE_NUMBER_TEXT}}' => $_SERVER['PHONE_NUMBER_TEXT'] ?? '',
]);

$footer = $_SERVER['FOOTER_HTML'] ?? '';
?>
<!DOCTYPE html>
<html lang="<?php echo $hl; ?>">
<head>
    <title>Sylius Hackathon</title>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="https://raw.githubusercontent.com/monsieurbiz/event-sylius-hackathon/master/public/main.jpg" />
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
    </div>
    <?php echo $footer; ?>
</body>
</html>
