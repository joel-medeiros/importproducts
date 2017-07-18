<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 27/06/17
 * Time: 22:15
 */

namespace App\Presenters;

use Collective\Html\FormFacade as Form;
use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter
{

    /**
     * @return \Illuminate\Support\HtmlString
     */
    public function status()
    {
        return $this->active ?
            Form::label(trans('products.labels.active'), trans('products.labels.active'), ['class' => "label label-success"]) :
            Form::label(trans('products.labels.inactive'), trans('products.labels.inactive'), ['class' => "label label-danger"]);
    }

    /**
     * @return \Illuminate\Support\HtmlString|string
     */
    public function options()
    {
        $buttons = Form::button(
                trans('defaults.buttons.show', ['item' => '']),
                [
                    'class' => 'btn btn-sm btn-primary show-modal',
                    'data-route' => route('products.show', ['id' => $this->id])
                ]
            ) . "&nbsp" .
            Form::button(
                trans('defaults.buttons.edit', ['item' => '']),
                [
                    'class' => 'btn btn-sm btn-warning show-modal',
                    'data-route' => route('products.edit', ['id' => $this->id])
                ]
            ) . "&nbsp;";

        $buttons .= ! $this->active ?
            Form::button(
                trans('products.buttons.active'),
                [
                    'class' => 'btn btn-sm btn-success toggle',
                    'data-route' => route('products.active', ['id' => $this->id]),
                    'data-message' => trans('products.buttons.confirm', [
                        'status' => trans('products.buttons.active'),
                        'item' => $this->name
                    ]),
                    'data-method' => 'PUT'
                ]
            ) :
            Form::button(
                trans('products.buttons.inactive'),
                [
                    'class' => 'btn btn-sm btn-danger toggle',
                    'data-route' => route('products.inactive', ['id' => $this->id]),
                    'data-message' => trans('products.buttons.confirm', [
                        'status' => trans('products.buttons.inactive'),
                        'item' => $this->name
                    ]),
                    'data-method' => 'DELETE'
                ]
            );

        return $buttons;
    }

    public function currency()
    {
        return "R$ " . number_format($this->price, 2, ',', '.');
    }

}