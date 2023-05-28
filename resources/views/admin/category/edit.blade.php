@extends('layouts.admin_layout')

@section('title', 'Редактирование категории')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста № {{ $posts['id'] }} автора {{ $posts['creator_id'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('posts.update', $posts['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >Видимость</label><br/>
                                    <select name="published" required="required" >
                                        <option value="{{$posts['published']}}">без изменений</option>
                                        <option value="1">пост видят все</option>
                                        <option value="0">пост видят только администраторы и модераторы</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Категория</label><br/>
                                    <select name="cat_id" required>
                                        <option value="{{$posts['cat_id']}}">без изменений</option>
                                        <option value="1">мемы</option>
                                        <option value="2">пейзажи</option>
                                        <option value="3">другое</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Превью поста</label>
                                    <input type="text" value="{{ $posts['preview_img'] }}" name="preview_img" class="form-control"
                                           id="exampleInputEmail1" placeholder="" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection