@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li {{ isset($list) ? 'class=active' : '' }}>
                <a href="{{ route('blogs.index') . qString() }}">
                    <i class="fa fa-list" aria-hidden="true"></i> Blog List
                </a>
            </li>

            <li {{ isset($create) ? 'class=active' : '' }}>
                <a href="{{ route('blogs.create') . qString() }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Blog
                </a>
            </li>

            @if (isset($edit))
            <li class="active">
                <a href="#">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit Blog
                </a>
            </li>
            @endif

            @if (isset($show))
            <li class="active">
                <a href="#">
                    <i class="fa fa-list-alt" aria-hidden="true"></i> Blog Details
                </a>
            </li>
            @endif
        </ul>

        <div class="tab-content">
            @if (isset($show))
            <div class="tab-pane active">
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:150px;">Image</th>
                            <th style="width:10px;">:</th>
                            <td>{!! viewImg('blogs', $data->image, ['popup' => 1, 'style' => 'max-width:100%;']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <th>:</th>
                            <td>{{ $data->title }}</td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <th>:</th>
                            <td>{!! $data->details !!}</td>
                        </tr>
                        <tr>
                            <th>SEO Meta Title</th>
                            <th>:</th>
                            <td>{{ $data->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>SEO Meta Keyword</th>
                            <th>:</th>
                            <td>{{ $data->meta_keywords }}</td>
                        </tr>
                        <tr>
                            <th>SEO Meta Description</th>
                            <th>:</th>
                            <td>{{ $data->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>{{ $data->status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @elseif(isset($edit) || isset($create))
            <div class="tab-pane active">
                <div class="box-body">
                    <form method="POST" action="{{ isset($edit) ? route('blogs.update', $edit) : route('blogs.store') }}{{ qString() }}" id="are_you_sure" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        @if (isset($edit))
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3 required">Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{ old('title', isset($data) ? $data->title : '') }}" required>

                                        @if ($errors->has('title'))
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3 required">Details:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control summernote" name="details" rows="6">{{ old('details', isset($data) ? $data->details : '') }}</textarea>

                                        @if ($errors->has('details'))
                                        <span class="help-block">{{ $errors->first('details') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3 {{ isset($edit) ? '' : 'required' }}">Image:</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image" onchange="readURL(this)" {{
                                            isset($edit) ? '' : 'required' }}>

                                        @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3 required">Status:</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control" required>
                                            @php($status = old('status', isset($data) ? $data->status : ''))
                                            @foreach (['Active', 'Deactivated'] as $sts)
                                            <option value="{{ $sts }}" {{ $status==$sts ? 'selected' : '' }}>{{ $sts }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <h4 class="col-sm-9 col-sm-offset-3">SEO
                                    <hr class="hr-0" />
                                </h4>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 required">Meta Title:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', isset($data) ? $data->meta_title : '') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', isset($data) ? $data->meta_keywords : '') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3 required">Meta Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="meta_description" rows="6">{{ old('meta_description', isset($data) ? $data->meta_description : '') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success btn-flat btn-lg">{{ isset($edit) ?
                                        'Update' : 'Create' }}</button>
                                    <button type="reset" class="btn btn-custom btn-flat btn-lg">Clear</button>
                                </div>
                            </div>

                            <div class="col-sm-4 text-center">
                                {!! viewImg('blogs', isset($data->image) ? $data->image : '', [
                                'popup' => 1,
                                'style' => 'width:100%;',
                                'id' => 'img_preview',
                                'fake' => 'fake',
                                ]) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @elseif (isset($list))
            <div class="tab-pane active">
                <form method="GET" action="{{ route('blogs.index') }}" class="form-inline">
                    <div class="box-header text-right">
                        <div class="row">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="">Any Status</option>
                                    @foreach (['Active', 'Deactivated'] as $sts)
                                    <option value="{{ $sts }}" {{ Request::get('status')==$sts ? 'selected' : '' }}>
                                        {{ $sts }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="q" value="{{ Request::get('q') }}" placeholder="Write your search text...">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom btn-flat">Search</button>
                                <a class="btn btn-custom btn-flat" href="{{ route('blogs.index') }}">X</a>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="col-action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $val)
                            <tr>
                                <td>{!! viewImg('blogs', $val->image, ['thumb' => 1, 'popup' => 1, 'style' =>
                                    'width:30px;', 'fake' => 'fake']) !!}</td>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-default btn-flat btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ route('blogs.show', $val->id) . qString() }}"><i class="fa fa-eye"></i> Show</a></li>
                                            <li><a href="{{ route('blogs.edit', $val->id) . qString() }}"><i class="fa fa-eye"></i> Edit</a></li>
                                            <li><a onclick="deleted('{{ route('blogs.destroy', $val->id) . qString() }}')"><i class="fa fa-close"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-4 pagi-msg">{!! pagiMsg($records) !!}</div>

                    <div class="col-sm-4 text-center">
                        {{ $records->appends(Request::except('page'))->links() }}
                    </div>

                    <div class="col-sm-4">
                        <div class="pagi-limit-box">
                            <div class="input-group pagi-limit-box-body">
                                <span class="input-group-addon">Show:</span>

                                <select class="form-control pagi-limit" name="limit">
                                    @foreach (paginations() as $pag)
                                    <option value="{{ qUrl(['limit' => $pag]) }}" {{ $pag==Request::get('limit')
                                        ? 'selected' : '' }}>
                                        {{ $pag }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection