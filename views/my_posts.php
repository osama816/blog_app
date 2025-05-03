<!-- Main Content-->
<link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/assets/css/style.css' ?>">
<?Php $page_num = $_GET['page_num'] ?? 1 ?>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <main class="container mt-4">
                <h2 class='mb-4'> MY Posts</h2>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo "<div class='alert alert-danger'>Please login to view your posts</div>";
                } else {
                    $blogs = get_myposts($page_num);

                    if (!empty($blogs)) :
                        foreach ($blogs as  $blog) :
                            $user_name = get_username($blog["user_id"])['name'];
                ?>
                            <!-- Post preview-->
                            <div class='card post-card p-4'>
                                <div class='card-body'>
                                    <h6 class='user-name'>User Name : <?= $user_name ?> </h6>
                                    <h5 class='card-title'><?= $blog['title'] ?></h5>
                                    <p class='card-text'><?= $blog['content'] ?></p>
                                    <a href="index.php?page=show-blog&action=show&id=<?= $blog['id'] ?>">
                                        <img width='90%' height='200' src="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>" alt=''>
                                    </a>
                                    <h6 class='user-name'>Created At : <?= $blog['create_at'] ?></h6>
                                </div>
                            </div>
                            <!-- Divider-->
                            <hr class="my-5" />
                    <?php endforeach;
                    else :
                        ?>
                        <div class="alert alert-info">No Posts Found</div>
                    <?php endif;
                    }
                    ?>
            </main>
        </div>
    </div>
</div>
<nav class="d-flex justify-content-center" aria-label="...">
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= posts_number_myposts(); $i++) :
        ?>
            <li class="page-item <?= $i == $page_num ? 'active' : '' ?> " aria-current="page">
                <a class="page-link" href="?page=my_posts&page_num=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>