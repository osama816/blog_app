<div class="container mt-5 show-page">
    <div class="row justify-content-center">
        <?php
        if ($_GET['action'] == "show" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = find_blog($id);
        }
        ?>
        <div class='card post-card'>
            <div class='card-body'>
                <h5 class='card-title'><?=$blog['title']?></h5>
                <p class='card-text'><?=$blog['content']?></p>
                <img src="<?=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>" alt='Blog Image'>
                <h6 class='user-name'>Created At :  <?= $blog['create_at'] ?? date('Y-m-d') ?></h6>
            </div>
        </div>
    </div>
</div>
