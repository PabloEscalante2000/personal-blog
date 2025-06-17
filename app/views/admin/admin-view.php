<div class="py-5 bg-blue-500 text-white w-full">
    <div class="w-full max-w-[1000px] mx-auto px-5 flex justify-between items-center">
        <h1 class="text-4xl font-bold">
            Personal Blog
        </h1>
        <a class="block w-fit px-5 py-3 rounded-sm bg-white text-blue-500 text-xl font-light transition-all hover:scale-95" href="./new">
            Add +
        </a>
    </div>
</div>
<div class="p-5 w-full max-w-[1000px] mx-auto" id="admin-list">
    <?php require_once(__DIR__."/../../logic/read-admin-logic.php") ?>
</div>
