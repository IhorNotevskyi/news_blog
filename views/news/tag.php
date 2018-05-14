<h2 style="text-align: center; margin: 40px 0 10px">Результаты поиска</h2>
<div class="starter-template" style="min-height: 300px; text-align: left">
    <?php if (!isset($data['tags'][0]['id_news'])): ?>
        <ul class="list-unstyled tag-list search-by-tags">
            <?php foreach ($data['tags'] as $key => $value): ?>
                <li style="margin-bottom: 35px; line-height: 34px">
                    <a href="/news/tag/<?= $key; ?>">&middot;&ensp;<?= $value ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <ul class="list-unstyled tag-list">
            <?php foreach ($data['tags'] as $key => $value): ?>
                <li style="margin-bottom: 35px; line-height: 34px">
                    <a href="/news/list/<?= $value['id_news']; ?>">&middot;&ensp;<?= $value['title_news'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>