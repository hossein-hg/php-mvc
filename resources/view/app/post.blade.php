@extends('app.layouts.master')

@section('head-tag')
<title>صفحه ی پست</title>
@endsection

@section('content')
<div class="hero-wrap" style="background-image: url('<?= asset('images-app/bg_1.jpg') ?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?= route('home') ?>">خانه</a></span> <span class="mr-2"><a href="<?= route('allPosts') ?>">بلاگ ها</a></span> <span><?= $post->title ?></span></p>
          <h1 class="mb-3 bread">بلاگ</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3"><?= $post->title ?></h2>
          <img src="<?= asset($post->image) ?>" alt="" class="img-fluid">
      
     <p>
        <?= html_entity_decode($post->body) ?>
     </p>


          <div class="pt-5 mt-5">
            <h3 class="mb-5">نظرات</h3>
            <ul class="comment-list">
               <?php foreach ($comments as $comment){ ?>

              <li class="comment">
                <div class="vcard bio">
                  <img src="<?= asset('images-app/person_1.jpg') ?>" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3><?= $comment->user()->first_name.' '.$comment->user()->last_name ?></h3>
                  <div class="meta"><?= \Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%B %d. %Y') ?></div>
                  <p><?= $comment->comment ?></p>

                </div>
                  <?php $childComment = $comment->child();

                  if (!empty($childComment)){


                  ?>

                  <ul class="children">
                      <li class="comment bg-light">
                          <div class="vcard bio">
                              <img src="<?= asset('images-app/person_1.jpg') ?>" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                              <h3>پاسخ ادمین :<?= $childComment->user()->first_name.' '.$childComment->user()->last_name ?></h3>
                              <div class="meta"><?= \Morilog\Jalali\Jalalian::forge($childComment->created_at)->format('%B %d. %Y') ?></div>
                              <p><?= $childComment->comment ?></p>

                          </div>

                      </li>
                  </ul>
                    <?php } ?>

              </li>
                <?php } ?>

            </ul>
            <!-- END comment-list -->
            
            <div class="comment-form-wrap pt-5">
                <?php if (\System\Auth\Auth::checkLogin()) { ?>
              <h3 class="mb-5">درج نظر</h3>
              <form method="post" action="<?= route('post.comment',[$post->id]) ?>" class="p-5 bg-light">


                <div class="form-group">
                  <label for="message">پیام</label>
                  <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                    <?= errorText('comment') ?>
                </div>
                <div class="form-group">
                  <input type="submit" value="ارسال نطر" class="btn py-3 px-4 btn-primary">
                </div>

              </form>
                <?php } else{ ?>
                <p>
                    برای درج نظر لطفا ابتدا وارد شوید
                </p>
                <?php } ?>
            </div>
          </div>

        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
         
            <div class="sidebar-box ftco-animate">
                <div class="categories">
                    <h3>دسته بندی ها</h3>
                    <?php foreach($categories as $category) { ?>
                    <li><a href="<?= route('category',[$category->id]) ?>"><?= $category->name ?> <span><?= count($category->ads()->get()) ?></span></a></li>
                    <?php } ?>
                </div>
            </div>

            <div class="sidebar-box ftco-animate">
                <h3>اخرین بلاگ ها</h3>
                <?php foreach($posts as $post) { ?>
                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url('<?= asset($post->image) ?>');"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#"><?= $post->title ?></a></h3>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span><?= \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y')?></a></div>
                            <div><a href="#"><span class="icon-person"></span> <?= $post->user()->first_name . ' ' . $post->user()->last_name ?></a></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
       

          
      </div>
    </div>
  </section> <!-- .section -->
      

@endsection