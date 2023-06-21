@extends('layouts.default')

{{-- Page title --}}
@section('title')
Sport @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Sport</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($sport, ['route' => ['sports.update', $sport->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('sports.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
