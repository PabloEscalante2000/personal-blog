<?php
    $json = file_get_contents(__DIR__."/../../DB/data.json");
    $data = json_decode($json, true);
    $blogs = $data["blogs"];

    if(count($blogs) > 0):
?>

<?php 
    foreach($blogs as $blog):
?>
<div class="p-5 rounded-lg my-3 flex justify-between items-center w-full bg-blue-200 cursor-pointer hover:scale-95 transition-all" onclick="toArticle('<?= $blog['id'] ?>')">
    <h2 class="text-lg text-blue-600"><?= $blog["title"] ?></h2>
    <h2 class="text-lg text-blue-600"><?= $blog["date"] ?></h2>
</div>

<?php
    endforeach;
    else:
?>

<div class="mx-auto">
    <h2 class="text-xl text-blue-500 font-bold">There aren't any blogs yet...</h2>
</div>

<?php endif; ?>