@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <table class="table w-100" id="data">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Код</th>
                <th scope="col">Наименование</th>
                <th scope="col">Уровень1</th>
                <th scope="col">Уровень2</th>
                <th scope="col">Уровень3</th>
                <th scope="col">Цена</th>
                <th scope="col">ЦенаСП</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Поля свойств</th>
                <th scope="col">Совместные покупки</th>
                <th scope="col">Ед. измерения</th>
                <th scope="col">Картинка</th>
                <th scope="col">Выводить на главной</th>
                <th scope="col">Описание</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->level1 }}</td>
                    <td>{{ $product->level2 }}</td>
                    <td>{{ $product->level3 }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->priceCP }}</td>
                    <td>{{ $product->count }}</td>
                    <td>{{ $product->properties }}</td>
                    <td>{{ $product->joint }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->image }}</td>
                    <td>{{ $product->showMain }}</td>
                    <td>{{ $product->description }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <style>
        table th {
            padding: 5px !important
        }
    </style>
@endsection
@section('scripts')
    <script>
        $("#data").DataTable()
    </script>
@endsection
