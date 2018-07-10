@extends('layout')
@section('title', 'dodawanie produktu')

@section('content')
<?php echo Form::open(['route' => 'comunicaty.product.addStore']); ?>
<?php echo Form::text('name');?>
<?php echo Form::number('amount');?>
<?php echo Form::submit('Zapisz');?>
<?php echo Form::close(); ?> 
@endsection