<div class="py-5 bg-blue-500 text-white w-full">
    <div class="w-full max-w-[1000px] mx-auto px-5 flex justify-between items-center">
        <h1 class="text-4xl font-bold">
            Personal Blog
        </h1>
    </div>
</div>
<div class="p-5 w-full max-w-[1000px] mx-auto space-y-5">
    <h1 class="text-3xl text-blue-500 font-bold">New Article</h1>
    <form id="create-form" class="space-y-5" action="./app/logic/create-logic.php" method="post">
        <input required type="text" placeholder="Article Title" name="article_title" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" />
        <input required type="date" placeholder="Publishing Date" name="article_date" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" />
        <textarea placeholder="Content" name="article_content" class="w-full p-5 rounded-lg border-4 border-blue-400 text-xl outline-transparent" rows="8" cols="50" required style="resize: none;"></textarea>
        <input type="submit" value="Create" class="text-xl rounded-full px-5 py-3 text-white bg-blue-500 w-40"/>
    </form>
</div>