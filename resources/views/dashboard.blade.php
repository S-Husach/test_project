@extends('layouts.app')

<x-header />

@section('content')

<x-modal />

@include('inc.modal')

<div class="container widget_data">
  <div class="card-deck mb-3 text-center">

    <x-widget class="widget_max_amount" name="Top Donation"/>
    <x-widget class="widget_totalMonth" name="Current Month Amount"/>
    <x-widget class="widget_total" name="All Time Amount"/>

  </div>
</div>

@include('inc.widget')

<x-chart />

@include('inc.chart')

<x-table />

@include('inc.table')

@endsection

<!-- $widgets = [
    [
        'name' => 'td',
        'asdasd' => ''
    ],
    [
        'name' => 'td',
        'asdasd' => ''
    ]
] -->