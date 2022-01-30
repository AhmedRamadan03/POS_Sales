@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @lang('site.users')
            </h1>

            <ol class="breadcrumb">
                <li ><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard') </a></li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border" style="margin-bottom:10px ">
                    <h3 class="box-title">@lang('site.users')</h3>

                    <form action="" style="margin-top:10px;" autocomplete="off">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-sm"><li class="fa fa-search"></li> @lang('site.search')</button>
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> @lang('site.add_user')   </a>
                            </div>
                        </div>
                    </form>


                </div><!-- end of box header -->
                <div class="box-body">
                  @if ($users->count() > 0)
                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>@lang('site.first_name')</td>
                            <td>@lang('site.last_name')</td>
                            <td>@lang('site.email')</td>
                            <td>@lang('site.action')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index=>$user )
                            <tr>
                                <td>{{ $index +1}}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    <form action="{{ route('dashboard.users.destroy',$user->id) }}" method="post" style="display: inline;">
                                       @csrf
                                       <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trus "></i>@lang('site.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>   <!-- end of table  -->
                  @else
                      <h2>@lang('site.no_data_found')</h2>
                  @endif
                </div>
            </div>
        </section>
    </div>
@endsection
