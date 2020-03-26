@extends('layouts.app')

@section('content')
    <div class="contents">
        <div class="category-header">
            <div class="category-header__title">
                <h4>カテゴリーマスター</h4>
            </div>
        </div>
{{--        <form action="/master/delete" method="post">--}}
{{--            @method('delete')--}}
{{--            @csrf--}}
            <div class="category-menu">
                <div class="category-menu__item">
                    <a href="/master/category/create">
                        <button type="button" class="category-button">新規登録</button>
                    </a>
                </div>
                <div class="category-menu__item">
                    <input type="submit" value="一括削除">
                </div>
            </div>
            <div class="category-body">
                <table class="category-table" border="1" rules="cols">
                    <tr class="category-table__label">
                        <th></th>
                        <th class="js_category_master_item" data-column="id">ID</th>
                        <th class="js_category_master_item" data-column="category_name">カテゴリ</th>
                        <th class="js_category_master_item" data-column="updated_at">更新日</th>
                        <th>編集</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr class="category-table__row">
                            <td>
                                <input type="checkbox" name="delete-chk[{{ $category->getId()  }}]" class="">
                            </td>
                            <td data-label="id">
                                {{ $category->getId() }}
                            </td>
                            <td data-label="カテゴリー名称">
                                {{$category->getCategoryName()}}
                            </td>
                            <td>{{$category->getUpdateDate()}}</td>
                            <td>
                                <a href="/master/pdf">
                                    <button class="btn btn-black">編集</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
{{--        </form>--}}
    </div>
@endsection
