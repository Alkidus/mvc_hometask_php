<h1 class="text-center"><?= $title ?></h1>
<div>
    <?= $text ?>
</div>

<? foreach ($categories as $category) : ?>
    <div><?= $category->name ?></div>
<?php endforeach ?>

<h2>Articles</h2>
<? foreach ($articles as $article) : ?>
    <div><?= $article->name ?>, <?= $article->getCategory() ?></div>
<?php endforeach ?>