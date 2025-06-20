<?php
// 题目数据库
$challenges = [
    'web' => [
        [
            'id' => 1,
            'title' => '简单的HTML页面',
            'desc' => 'F12不会吗',
            'difficulty' => 'easy',
            'tags' => ['F12','header'],
            'path' => 'topic1/ezhtml.php'
        ],
        [
            'id' => 2,
            'title' => 'mathematics',
            'desc' => '数学挑战！！',
            'difficulty' => 'medium',
            'tags' => ['python脚本编写'],
            'path' => 'topic2/mathematics.php'
        ],
        [
            'id' => 3,
            'title' => 'weak',
            'desc' => '简单的密码',
            'difficulty' => 'easy',
            'tags' => ['弱口令'],
            'path' => 'topic3/weak.php'
        ],
        [
            'id' => 4,
            'title' => 'strong',
            'desc' => '这个密码你可猜不出来哦~',
            'difficulty' => 'medium',
            'tags' => ['sql'],
            'path' => 'topic4/index.php'
        ],
        [
            'id' => 5,
            'title' => 'ezphp',
            'desc' => '[MoeCTF 2022]ezphp',
            'difficulty' => 'hard',
            'tags' => ['变量覆盖'],
            'path' => 'topic5/index.php'
        ],
        [
            'id' => 6,
            'title' => 'easy_uploads',
            'desc' => '文件上传',
            'difficulty' => 'easy',
            'tags' => ['mime_type'],
            'path' => 'topic6/index.php'
        ],
        [
            'id' => 7,
            'title' => 'easy_rce',
            'desc' => '远程命令执行',
            'difficulty' => 'easy',
            'tags' => ['rce'],
            'path' => 'topic7/index.php'
        ],
        [
            'id' => 8,
            'title' => 'medium_uploads',
            'desc' => '文件上传(条件竞争)',
            'difficulty' => 'medium',
            'tags' => ['upload'],
            'path' => 'topic8/index.php'
        ],
        [
            'id' => 9,
            'title' => 'jwt',
            'desc' => '本来简单的改参数，结果碰到了jwt',
            'difficulty' => 'medium',
            'tags' => ['XFF','jwt'],
            'path' => 'topic9/index.php'
        ],
        [
            'id' => 10,
            'title' => 'php特性_1',
            'desc' => '你知道php比较相关的特性吗？',
            'difficulty' => 'easy',
            'tags' => ['php','弱比较'],
            'path' => 'topic10/index.php'
        ],
        [
            'id' => 11,
            'title' => 'php反序列化_1',
            'desc' => '只要你会生成序列化就好了',
            'difficulty' => 'easy',
            'tags' => ['php','unserialize'],
            'path' => 'topic11/index.php'
        ],
        [
            'id' => 12,
            'title' => 'php反序列化_2',
            'desc' => '只要你会wakeup绕过就好了',
            'difficulty' => 'easy',
            'tags' => ['php','unserialize'],
            'path' => 'topic12/index.php'
        ]

    ]
    /*
    'crypto' => [
        [
            'id' => 3,
            'title' => 'JWT Master',
            'desc' => '破解JWT身份验证',
            'difficulty' => 'easy',
            'solves' => 42,
            'tags' => ['JWT', '密钥破解'],
            'path' => '/challenges/crypto/jwt-master.php'
        ]
    ]*/
];

// 难度标签样式
$difficultyStyles = [
    'easy' => 'bg-success',
    'medium' => 'bg-warning',
    'hard' => 'bg-danger'
];
?>