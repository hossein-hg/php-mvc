@extends('admin.layouts.app')
@section('head-tag')
    <title>Edit Category</title>
@endsection
@section('content')
<div class="content-body">

                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">دسته بندی</h4>
                                    <span><a href="<?= route('admin.category.index') ?>" class="btn btn-success">بازگشت</a></span>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <form class="row" action="<?= route('admin.category.update',[$category->id]) ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="put">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="helperText">نام دسته</label>
                                                    <input value="<?= oldOrValue('name',$category->name) ?>" name="name"  type="text" id="helperText" class="form-control <?= errorClass('name') ?>" placeholder="نام ...">
                                                </fieldset>
                                                <?= errorText('name') ?>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <div class="form-group">
                                                        <label for="helperText">دسته والد</label>
                                                        <select name="parent_id" class="select2 form-control <?= errorClass('parent_id') ?>">
                                                            <option value="">درصورت وجود والد انتخاب شود</option>
                                                            <?php foreach ($categories as $cate){ ; ?>
                                                            <option <?php if ($category->parent_id == $cate->id) {echo "selected";} ?> value="<?= $cate->id ?>"><?= $cate->name ?></option>
                                                            <?php }?>


                                                        </select>
                                                    </div>
                                                    <?= errorText('parent_id') ?>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-primary">آپدیت</button>
                                                </fieldset>
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

