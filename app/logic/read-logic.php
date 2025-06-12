<?php
    $json = file_get_contents(__DIR__."/../../DB/data.json");
    $data = json_decode($json, true);
    $blogs = $data["blogs"];

    if(count($blogs) > 0):
?>

<div>
    blogs
</div>

<?php
    else:
?>

<div class="mx-auto">
    <h2 class="text-xl text-blue-500 font-bold">There aren't any blogs yet...</h2>
</div>

<?php endif; ?>