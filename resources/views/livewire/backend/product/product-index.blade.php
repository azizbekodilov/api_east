@section('title', 'Продукты - EastMetProkat')
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Продукты</h1>
                    <a href="/east/products/add" class="btn btn-primary mt-2">
                        Добавить
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Продукты</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>№</th>
                                                    <th>Названия</th>
                                                    <th>Поставщик</th>
                                                    <th>Остаток</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($collection as $item)
                                                <tr>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->dimensions}}</td>
                                                    <td>
                                                        {{$item->partner->title}}
                                                    </td>
                                                    <td>{{$item->balance}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="/east/products/{{$item->id}}" class="btn btn-sm btn-secondary">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <button disabled class="btn btn-sm btn-danger" wire:click="delete({{$item->id}})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Rendering engine</th>
                                                    <th rowspan="1" colspan="1">Browser</th>
                                                    <th rowspan="1" colspan="1">Platform(s)</th>
                                                    <th rowspan="1" colspan="1">Engine version</th>
                                                    <th rowspan="1" colspan="1">CSS grade</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">

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
