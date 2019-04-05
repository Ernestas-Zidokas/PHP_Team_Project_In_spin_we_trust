<?php
require '../bootloader.php';

$form = [
    'fields' => [
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Paduoti!'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];
$slot3x3 = new App\SlotMachine3x3();
$slot3x3->Shuffle();


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
                    <a href="index.php">Home</a>
                    <a href="slot5x5.php">Wanna more?</a>
                </nav>
                <h1>3x3</h1>
                <div class="slotmachine">
                    <?php foreach ($slot3x3->Shuffle() as $column): ?>
                        <div class="row">
                            <?php foreach ($column as $col_data): ?>
                                <div class="element element-<?php print $col_data; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($slot3x3->isWin()): ?>
                    <h2>YOU WIN</h2>
                <?php else: ?>
                    <h2>PLAY AGAIN</h2>
                <?php endif; ?>
                <?php require '../core/views/form.php'; ?>
            </div>
        </div>
    </body>
</html>