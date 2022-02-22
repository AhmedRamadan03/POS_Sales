@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-users"></i> @lang('site.clients')
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard') </a>
                </li>
                <li class="active"><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-users"></i>
                        @lang('site.clients') </a></li>
                <li class="active"><i class="fa fa-user"></i> @lang('site.add_client')</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">@lang('site.add_client')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    {{-- @include('partials._errors') --}}

                   
                </div><!-- end of box body -->

            </div><!-- end of box -->
        </section>
    </div>
@endsection
