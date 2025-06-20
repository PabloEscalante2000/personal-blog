<?php
    $id = $url[1];
    $data = file_get_contents(__DIR__."/../../../DB/data.json");
    $data = json_decode($data,true);
    $blogs = $data["blogs"];

    foreach($blogs as $blog){
        if($blog["id"] === $id){
            $current_blog = $blogs;
            break;
        }
    }

    if(!isset($current_blog)){
        echo "<div>Blog not found</div>";
        exit;
    }

    // Getting blog's file

    $ruta = __DIR__."/../../../DB/blogs/".$id."-blog.json";
    if(file_exists($ruta)){
        $data = file_get_contents($ruta);
        $current_blog = json_decode($data,true);
    } else {
        echo "<div>Blog's file not found</div>";
        exit;
    }

    
?>
<div class="py-5 bg-blue-500 text-white w-full">
    <div class="w-full max-w-[1000px] mx-auto px-5 flex justify-between items-center">
        <h1 class="text-4xl font-bold">
            Personal Blog
        </h1>
    </div>
</div>
<div class="p-5 w-full max-w-[1000px] mx-auto space-y-5">
    <h1 class="text-3xl text-blue-500 font-bold">Update Article</h1>
    <form id="update-form" class="space-y-5" action="<?= BASE_URL ?>app/logic/update-logic.php" method="post">
        <input name="article_id" type="hidden" value="<?= $current_blog["id"] ?>"/>
        <input required type="text" placeholder="Article Title" name="article_title" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" value="<?= $current_blog["title"] ?>"/>
        <input required type="date" placeholder="Publishing Date" name="article_date" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" value="<?= $current_blog["date"] ?>" />
        <textarea placeholder="Content" name="article_content" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" rows="8" cols="50" required style="resize: none;"><?= $current_blog["content"] ?></textarea>
        <input type="submit" value="Update" class="text-xl rounded-full px-5 py-3 text-white bg-blue-500 w-40"/>
    </form>
</div>