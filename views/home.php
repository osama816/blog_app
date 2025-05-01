<!-- Main Content-->
<link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/assets/css/style.css' ?>">

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
        <main class="container mt-4"></main>
        <h2 class='mb-4'> All Posts</h2>
            <?php
            $blogs=All_Blogs() ;
            
             if (!empty($blogs)) :
            foreach ($blogs as  $blog) :
               $user_name=get_username($blog["user_id"])['name'];
            ?>
            <!-- Post preview-->

         
             <div class='card post-card p-4'>
    
                  <div class='card-body'>
            <h6 class='user-name'>User Name : <?=$user_name?> </h6>
            
                <h5 class='card-title'><?=$blog['title']?></h5>
                
                <p class='card-text'><?=$blog['content']?></p>
    
                <img width='90%' height='200' src="<?=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>" alt=''>
                <h6 class='user-name'>Created At :  <?=$blog['create_at']?></h6>
                 </div>
             </div>
            <!-- Divider-->
            <hr class="my-5" />
             <?php endforeach;
             endif;?>
        </div>
        </main>
    </div>
</div>

<!-- Footer-->

    <!-- else {
        echo "<h2 class='mb-4'>No Posts</h2>";
    } -->
