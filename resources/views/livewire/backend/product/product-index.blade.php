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
                                                    <th>Размер</th>
                                                    <th>Марка</th>
                                                    <th>Поставщик</th>
                                                    <th>Остаток</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($collection as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->title }} </td>
                                                        <td>
                                                            @if($item->height)
                                                            {{$item->width ?? ''}} {{$item->height ?? ''}} {{$item->thickness ?? ''}} {{$item->length ?? ''}}
                                                            @elseif($item->thickness != null)
                                                            {{$item->thickness ?? ''}} {{$item->width ?? ''}} {{$item->length ?? ''}}
                                                            @else
                                                            {{ $item->dimensions }}
                                                            @endif
                                                        </td>
                                                        <td>{{$item->mark ?? ''}}</td>
                                                        <td>
                                                            {{ $item->partner->title }}
                                                        </td>
                                                        <td>{{ $item->balance }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="/east/products/{{ $item->id }}"
                                                                    class="btn btn-sm btn-secondary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button disabled class="btn btn-sm btn-danger"
                                                                    wire:click="delete({{ $item->id }})">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
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
