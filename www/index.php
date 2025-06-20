<?php
    include "challenges.php";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>CTF题目索引</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .challenge-card {
            transition: transform 0.2s;
            cursor: pointer;
        }
        .challenge-card:hover {
            transform: translateY(-5px);
        }
        .tag {
            font-size: 0.8em;
            margin-right: 5px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">CTF题目列表</h1>

        <!-- 分类导航 -->
        <nav class="nav nav-pills mb-4">
            <?php foreach ($challenges as $category => $items): ?>
            <a class="nav-link" href="#<?= htmlspecialchars($category) ?>">
                <?= ucfirst($category) ?> (<?= count($items) ?>)
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- 题目列表 -->
        <?php foreach ($challenges as $category => $items): ?>
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <?= strtoupper($category) ?> 类题目
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($items as $challenge): ?>
                    <div class="col">
                        <div class="card challenge-card h-100"
                             onclick="window.location='<?= $challenge['path'] ?>'">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= htmlspecialchars($challenge['title']) ?>
                                    <span class="badge <?= $difficultyStyles[$challenge['difficulty']] ?> float-end">
                                        <?= strtoupper($challenge['difficulty']) ?>
                                    </span>
                                </h5>
                                <p class="card-text"><?= htmlspecialchars($challenge['desc']) ?></p>
                                <div class="mb-2">
                                    <?php foreach ($challenge['tags'] as $tag): ?>
                                    <span class="badge bg-secondary tag"><?= $tag ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>