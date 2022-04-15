
@extends('app.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <div class="hero-wrap" style="background-image: url('<?= asset('images-app/bg_1.jpg') ?>');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?= route('home') ?>">خانه</a></span>  <span>جست و جو</span></p>

                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">

                    <h2 class="mb-4"><?= $_GET['search'] ?></h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($ads as $bestAd) { ?>
                <div class="col-sm col-md-12 col-lg-4 ftco-animate">
                    <div class="properties">
                        <a href="<?= route('ads',[$bestAd->id]) ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('<?= asset($bestAd->image) ?>');">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <span class="status <?= $bestAd->sellStatus() == 'خرید' ? 'sale' : 'rent'  ?>"><?= $bestAd->sellStatus() ?></span>
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="<?= route('ads',[$bestAd->id]) ?>"><?= $bestAd->address ?></a></h3>
                                    <p><?= $bestAd->type() ?></p>
                                </div>
                                <div class="two">
                                    <span class="price"><?= $bestAd->amount ?></span>
                                </div>
                            </div>
                            <p><?=html_entity_decode(substr($bestAd->description,0,50)) ?>.......</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="flaticon-selection mx-1"></i>متر<?= $bestAd->area ?></span>
                                <span class="ml-auto"><i class="flaticon-bathtub"></i> <?= $bestAd->room ?></span>
                                <span><i class="flaticon-bed"></i> <?= $bestAd->toilet ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading"><?= $_GET['search'] ?></span>
                    <h2> بلاگ ها</h2>
                </div>
            </div>
            <div class="row d-flex">
                <?php foreach ($posts as $post){ ?>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="<?= route('post',[$post->id]) ?>" class="block-20" style="background-image: url('<?= asset($post->image) ?>');">
                        </a>
                        <div class="text mt-3 d-block">
                            <h3 class="heading mt-3"><a href="<?= route('post',[$post->id]) ?>"><?= $post->title ?></a></h3>
                            <div class="meta mb-3">
                                <div><a href="#"><?= \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y') ?></a></div>
                                <div><a href="#"><?= $post->user()->first_name.' '.$post->user()->last_name ?></a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> ۳</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


@endsection
