<?php
require '../bootloader.php';

$form = [
    'fields' => [
    ],
    'buttons' => [
        'submit' => [
            'text' => 'SPIN&WIN!'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];
?>

<html>
    <head>
        <title>Casino ple</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <div class="relative">
            <div class="casino">
                <nav>
                    <a href="index.php">HOME</a>
                    <a href="slot5x5.php">WANT SOME MORE?</a>
                </nav>
                <h1>IN SPIN WE TRUST</h1>
                <div class="slotmachine">
                    <div class="row">
                        <div class="element element-1">1</div>
                        <div class="element element-3">1</div>
                        <div class="element element-2">1</div>
                    </div>
                    <div class="row">
                        <div class="element element-3">1</div>
                        <div class="element element-2">1</div>
                        <div class="element element-1">1</div>
                    </div>
                    <div class="row">
                        <div class="element element-1">1</div>
                        <div class="element element-2">1</div>
                        <div class="element element-3">1</div>
                    </div>
                </div>
                <?php require '../core/views/form.php'; ?>
            </div>
        </div>
    </body>
</html>