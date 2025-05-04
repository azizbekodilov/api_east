@section('title', 'Продукты - EastMetProkat')
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить продукты</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item"><a href="/east/products">Продукты</a></li>
                        <li class="breadcrumb-item active">Добавить</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Основная информация</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body row">
                                <div class="form-group col-md-3">
                                    <label for="">Выбрать каталог</label>
                                    <select wire:model="catalog_id" class="form-control">
                                        <option value="">Выбрать</option>
                                        @foreach ($catalogs as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Тольшина</label>
                                    <input type="text" class="form-control" wire:model="thickness">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Длина</label>
                                    <input type="text" class="form-control" wire:model="width">
                                    @error('width')
                                        <span class="error invalid-feedback">Длинв не найдно</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Ширина</label>
                                    <input type="text" class="form-control" wire:model="length">
                                    @error('length')
                                        <span class="error invalid-feedback">Ширина не найдно</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Высота</label>
                                    <input type="text" class="form-control" wire:model="height">
                                    @error('height')
                                        <span class="error invalid-feedback">Высота не найдно</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Названия</label>
                                    <input type="text" wire:model="title" class="form-control" placeholder="Названия">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">URL</label>
                                    <input type="text" wire:model="slug" class="form-control" placeholder="URL">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Короткий текст</label>
                                    <input type="text" wire:model="short_text" class="form-control"
                                        placeholder="Короткий текст">
                                </div>
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="">Текст</label>
                                    <textarea wire:model="text" id="summernote" class="form-control" placeholder="Короткий текст"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Мета заголовок</label>
                                    <input type="text" wire:model="meta_title" class="form-control"
                                        placeholder="Мета заголовок">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Мета описания</label>
                                    <input type="text" wire:model="meta_description" class="form-control"
                                        placeholder="Мета описания">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="партнер">Выбрать партнер</label>
                                    <select wire:model="partner_id" class="form-control">
                                        <option value="">Выбрать</option>
                                        @foreach ($partners as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Цена">Цена</label>
                                    <input type="text" class="form-control" wire:model="price" placeholder="Цена">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Марка">Марка</label>
                                    <input type="text" class="form-control" wire:model="mark" placeholder="Марка">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Остаток">Остаток</label>
                                    <input type="text" class="form-control" wire:model="balance" placeholder="Остаток">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Фото</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="">
                                            <label class="custom-file-label" for="">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" wire:click="save" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:200
            });
        });
    </script>
    @endsection
