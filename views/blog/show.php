<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        if ($_GET['action'] == "show" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = find_blog($id);
        }
        ?>
        <div>title : <?= $blog['title'] ?></div>
        <img height="500" width="300"  src="<?= "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>">
        <div class="mt-5">
            
            <div>content : <?= $blog['content'] ?></div>
            <div>create_at : <?= $blog['create_at'] ?? date('Y-m-d') ?></div>
        </div>
    </div>
</div>