<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            foreach (All_Blogs() as  $blog) :
               $user_name=get_username($blog["user_id"])['name'];
            ?>
            <!-- Post preview-->
            <div class="post-preview">
                    <h2 class="post-title"><?=$blog['title']?></h2>  
                <a href="index.php?page=show-blog&action=show&id=<?= $blog['id'] ?>">
                <img width="150" src="<?=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>">
                </a>
                   <h3 class="post-subtitle"><?=$blog['content']?></h3>
                <p class="post-meta">
                    Posted by :
                    <?=$user_name?>
                   <p> <?=$blog['create_at']?></p>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
             <?php endforeach;?>
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>
<!-- Footer-->
