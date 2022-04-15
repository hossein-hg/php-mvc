@extends('admin.layouts.app')

@section('content')
                <div class="content-body">

                    <!-- Zero configuration table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">اسلایدشو</h4>
                                        <span><a href="#" class="btn btn-success">بازگشت</a></span>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">

                                            <form class="row" action="<?= route('admin.slide.update',[$slide->id]) ?>" method="post" enctype="multipart/form-data">

                                                <input type="hidden" name="_method" value="put">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="title">عنوان</label>
                                                        <input value="<?= oldOrValue('title',$slide->title) ?>" name="title" type="text" id="title" class="form-control <?= errorClass('title') ?>" placeholder="عنوان ...">
                                                        <?= errorText('title') ?>
                                                    </fieldset>
                                                </div>


                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="url">لینک</label>
                                                        <input value="<?= oldOrValue('url',$slide->url) ?>" name="url" type="text" id="url" class="form-control <?= errorClass('url') ?>" placeholder="عنوان ...">
                                                        <?= errorText('url') ?>
                                                    </fieldset>
                                                </div>


                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="address">آدرس</label>
                                                        <input value="<?= oldOrValue('address',$slide->address) ?>" name="address" type="text" id="address" class="form-control <?= errorClass('address') ?>" placeholder="عنوان ...">
                                                        <?= errorText('address') ?>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="amount">مبلغ</label>
                                                        <input value="<?= oldOrValue('amount',$slide->amount) ?>" name="amount" type="text" id="amount" class="form-control <?= errorClass('amount') ?>" placeholder="عنوان ...">
                                                        <?= errorText('amount') ?>
                                                    </fieldset>
                                                </div>


                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="image">تصویر</label>
                                                        <input name="image" type="file" id="image" class="form-control-file ">

                                                    </fieldset>
                                                </div>


                                                <div class="col-md-12">
                                                    <section class="form-group">
                                                        <label for="body">متن</label>
                                                        <textarea class="form-control" id="body" rows="5" name="body" placeholder="متن ..."><?= oldOrValue('body',$slide->body) ?></textarea>
                                                        <?= errorText('body') ?>
                                                    </section>
                                                </div>


                                                <div class="col-md-6">
                                                    <section class="form-group">
                                                        <button type="submit" class="btn btn-primary">آپدیت</button>
                                                    </section>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

@endsection
@section('head-tag')
    <title>اسلایدشو | ایجاد</title>
@endsection

@section('script')
    <script src="<?= asset('ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'body' );
    </script>
@endsection