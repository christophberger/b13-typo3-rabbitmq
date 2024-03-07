<?php
return [
    'frontend' => [
        'site-rabbit' => [
            'target' => \Site\Distribution\Middleware\RunTheRabbit::class,
            'after' => [
                'typo3/cms-frontend/authentication',
            ],
            'before' => [
                'typo3/cms-frontend/base-redirect-resolver',
            ],
        ],
    ],
];
