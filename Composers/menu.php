<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use Foostart\Category\Helpers\FooCategory;
use Foostart\Category\Helpers\SortTable;

/*
|-----------------------------------------------------------------------
| GLOBAL VARIABLES
|-----------------------------------------------------------------------
|   $sidebar_items
|   $sorting
|   $order_by
|   $plang_admin = 'class-admin'
|   $plang_front = 'class-front'
*/
View::composer([
                'Classmy::admin.class-edit',
                'Classmy::admin.class-form',
                'Classmy::admin.class-items',
                'Classmy::admin.class-item',
                'Classmy::admin.class-search',
                'Classmy::admin.class-config',
                'Classmy::admin.class-lang',
    ], function ($view) {

        //Order by params
        $params = Request::all();

        /**
         * $plang-admin
         * $plang-front
         */

        $plang_admin = 'Classmy-admin';
        $plang_front = 'Classmy-front';

        $fooCategory = new FooCategory();
        $key = $fooCategory->getContextKeyByRef('admin/Classmy');

        /**
         * $sidebar_items
         */
        $sidebar_items = [
            trans('Classmy-admin.sidebar.add') => [
                'url' => URL::route('Classmy.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            trans('Classmy-admin.sidebar.list') => [
                "url" => URL::route('Myclass.list', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
            trans('Classmy-admin.sidebar.category') => [
                'url'  => URL::route('categories.list',['_key='.$key]),
                'icon' => '<i class="fa fa-sitemap" aria-hidden="true"></i>'
            ],
            trans('Classmy-admin.sidebar.config') => [
                "url" => URL::route('Classmy.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],
            trans('Classmy-admin.sidebar.lang') => [
                "url" => URL::route('Classmy.lang', []),
                'icon' => '<i class="fa fa-language" aria-hidden="true"></i>'
            ],
        ];

        /**
         * $sorting
         * $order_by
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'id' => trans($plang_admin.'.fields.id'),
            'class_name' => trans($plang_admin.'.fields.name'),
            'status' => trans($plang_admin.'.columns.status'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];
        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sorting = $sortTable->linkOrders();



        //Order by
        $order_by = [
            'asc' => trans('category-admin.order.by-asc'),
            'desc' => trans('category-admin.order.by-des'),
        ];

        // assign to view
        $view->with('sidebar_items', $sidebar_items );
        $view->with('order_by', $order_by);
        $view->with('sorting', $sorting);
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
});
