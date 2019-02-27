
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">
<link rel="stylesheet" type="text/css" href="view/posts/poste.css">
 <div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="page-header">Postimet e bera ne platformen tone: </h2>
      <section class="comment-list">
        <!-- First Comment -->
        <?php foreach($posts as $post) { ?>
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" width="100px" height="100px" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center"><?php echo $post->name; ?></figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> <?php echo $post->titull; ?></div>

                  </header><br />
                  <?php if($post->content != ''): ?>
                    <div class="comment-post">

                      <textarea style="border: solid" rows="5" cols="50" readonly>
                        <?php echo $post->content; ?>
                      </textarea>

                      </div>
                      <br />
                    <?php endif ?>

                      <?php if($post->image != ''): ?>

                      <div class="imazh">
                        <img width="200px" height="200px" src="uploads/<?php echo $post->image; ?>">
                      <?php endif ?>
                      <br />
                      <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p> -->
                  <time class="comment-date" ><i class="fa fa-clock-o"></i>Postuar: <?php echo $post->data; ?></time> 
                    </div>
                  </div>
                </div>
              </article>
            <?php } ?>
          </body>
          </html>