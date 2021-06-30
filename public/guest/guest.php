    <?php
     require_once __DIR__ . '/guest_ini/header.php';
    ?>
  
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-normal"><?php echo $post['email'];?></h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
      </div>
    </div>
    <div class="card-body p-5 text-center">
      <h1>The world's largest selection of courses, <?php echo $post['name']; ?></h1>
    </div>

    <div class="row mb-2">
        <!-- card -->
        <?php $cards = $db->select("SELECT * From courses ORDER BY created_at DESC"); ?>
      <?php if (mysqli_num_rows($cards) > 0) :
        foreach ($cards as $card) :
      ?>
          <div class="col-md-6 col-sm-12 col-lg-3">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" height="150px" src="../courseThubnail/<?php echo  $card['thubnial']; ?>" alt="Card image cap">
              <div class="card-body d-flex flex-column align-items-start">
              <a type="submit" class="btn btn-primary mb-1 
                  enroll__request" href="enroll.php?id=<?php echo $card['id'];?>"
                   name="enroll__request" >
                  More Detial
              </a>
                <h5 class="mb-0">
                  <a class="text-dark" href="#"><?php echo $card['title']; ?></a>
                </h5>
                <div class="mb-1 text-muted"><?php echo date('jS, M, Y', strtotime($card['created_at'])); ?></div>
                <p class="card-text mb-auto"><?php echo substr($card['description'], 0, 50); ?></p>
                <a href="student_read_more.php?more=<?php echo $card['id'];?>">Continue reading</a>
              </div>
            </div>
          </div>
      <?php endforeach;
      endif; ?>
      <!-- end -->
    </div>
    <!-- </div> -->
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-4 mb-4 font-normal border-bottom">
            From the Firehose
          </h3>
        </div>
      </div>
    </main>
    <?php require_once __DIR__ . '/guest_ini/footer.php'; ?>