@extends('admin.layouts.app')
@section('head-tag')
    <title>ویرایش کاربر</title>
@endsection
@section('content')
            <div class="content-body">

                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <span><a href="#" class="btn btn-success">بازگشت</a></span>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <form class="row" action="<?= route('admin.user.update',[$user->id]) ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="put">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="first_name">نام</label>
                                                    <input name="first_name" type="text" id="first_name"  value="<?= oldOrValue('first_name',$user->first_name) ?>" class="form-control <?= errorClass('first_name') ?>" placeholder="نام ...">
                                                    <?= errorText('first_name') ?>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="last_name">نام خانوادگی</label>
                                                    <input name="last_name" type="text" id="last_name"  value="<?= oldOrValue('first_name',$user->last_name) ?>" class="form-control <?= errorClass('last_name') ?>" placeholder="نام خانوادگی ...">
                                                    <?= errorText('last_name') ?>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="avatar">تصویر</label>
                                                    <input name="avatar" type="file" id="avatar" class="form-control-file">
                                                </fieldset>
                                            </div>
                                            <img src="<?= $user->avatar ?>"  alt="">
                                            <div class="col-md-6">
                                                <section class="form-group">
                                                    <button type="submit" class="btn btn-primary">ویرایش</button>
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