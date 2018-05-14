<div class="starter-template">
    <h2 style="margin-bottom: 50px"><?= $data['data_analytics'][0]['category_name'] ?></h2>
    <?php foreach ($data['category_analytics'] as $value): ?>
        <?php if ($value['title_news'] == '') continue; ?>
        <ul class="list-unstyled" style="font-size: 20px; text-align: left">
            <li><a href="/news/list/<?= $value['id_news'] ?>">&middot;&ensp;<?= $value['title_news']; ?></a></li>
        </ul>
    <?php endforeach; ?>
</div>
<?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<div class="text-center" style="margin: -10px 0 20px">
    <ul class="pagination pagination-lg news-pagination pagination-parent">
        <?php if ($_GET['pages'] > 1): ?>
            <li class="page-item">
                <a class="page-link" href="/category/analytics/?pages=<?= $_GET['pages'] - 1; ?>">Предыдущая</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Предыдущая</span>
            </li>
        <?php endif; ?>

        <?php for ($j = 1; $j <= $data['category_analytics']['count']; $j++): ?>
            <?php if ($j == 2): ?>
                <li class="page-item dots" onclick="moveDots()" style="cursor: pointer">
                    <span class="page-link">...</span>
                </li>
            <?php endif; ?>
            <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>>
                <a href="/category/analytics/?pages=<?= $j; ?>"><?= $j; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($_GET['pages'] < $j - 1): ?>
            <li class="page-item">
                <a class="page-link" href="/category/analytics/?pages=<?= $_GET['pages'] + 1; ?>">Следующая</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Следующая</span>
            </li>
        <?php endif; ?>
    </ul>
</div>
<script src="/webroot/js/pagination.js" async></script>