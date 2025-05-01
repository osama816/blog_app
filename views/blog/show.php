<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        if ($_GET['action'] == "show" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = find_blog($id);
        }
        ?>
<div class='card post-card p-4'>
    
    <div class='card-body'>


  <h5 class='card-title'><?=$blog['title']?></h5>
  
  <p class='card-text'><?=$blog['content']?></p>

  <img width='90%' height='200' src="<?=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $blog['imags'] ?>" alt=''>
  <h6 class='user-name'>Created At :  <?= $blog['create_at'] ?? date('Y-m-d') ?></h6>
   </div>
</div>
    </div>
</div>
