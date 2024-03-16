@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li {{ isset($list) ? 'class=active' : '' }}>
                    <a href="{{ route('swatch-card.index') . qString() }}">
                        <i class="fa fa-list" aria-hidden="true"></i> Swatch Card List
                    </a>
                </li>

                <li {{ isset($create) ? 'class=active' : '' }}>
                    <a href="{{ route('swatch-card.create') . qString() }}">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Swatch Card
                    </a>
                </li>

                @if (isset($edit))
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-edit" aria-hidden="true"></i> Edit Swatch Card
                        </a>
                    </li>
                @endif

                @if (isset($show))
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> Swatch Card Details
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
                                    <th style="width:150px;">Name</th>
                                    <th style="width:10px;">:</th>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <th>product</th>
                                    <th>:</th>
                                    <td>{{ $data->product != null ? $data->product->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Buyer</th>
                                    <th>:</th>
                                    <td>{{ $data->buyer }}</td>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <th>:</th>
                                    <td>{{ $data->order }}</td>
                                </tr>

                                <tr>
                                    <th>Fabric Structure</th>
                                    <th>:</th>
                                    <td>{{ $data->fabric_structure }}</td>
                                </tr>

                                <tr>
                                    <th>Composition</th>
                                    <th>:</th>
                                    <td>{{ $data->composition }}</td>
                                </tr>

                                <tr>
                                    <th>Color</th>
                                    <th>:</th>
                                    <td>{{ $data->color }}</td>
                                </tr>
                                <tr>
                                    <th>Dia</th>
                                    <th>:</th>
                                    <td>{{ $data->dia }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>:</th>
                                    <td>{{ $data->date }}</td>
                                </tr>
                                <tr>
                                    <th>Gsm</th>
                                    <th>:</th>
                                    <td>{{ $data->gsm }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <th>:</th>
                                    <td>{{ $data->quantity }}</td>
                                </tr>

                                <tr>
                                    <th>Image</th>
                                    <th>:</th>
                                    <td>{!! viewImg('swatch_cards', $data->image, ['popup' => 1, 'style' => 'max-width:400px;']) !!}
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                @elseif(isset($edit) || isset($create))
                    <div class="tab-pane active">
                        <div class="box-body">
                            <form method="POST"
                                action="{{ isset($edit) ? route('swatch-card.update', $edit) : route('swatch-card.store') }}{{ qString() }}"
                                id="are_you_sure" class="form-horizontal" enctype="multipart/form-data">
                                @csrf

                                @if (isset($edit))
                                    @method('PUT')
                                @endif

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Product:</label>
                                            <div class="col-sm-9">
                                                <select name="product_id" class="form-control" required>
                                                    <option value="">Select Product</option>
                                                    @php($product_id = old('product_id', isset($data) ? $data->product_id : ''))
                                                    @foreach ($products as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ $product_id == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('product_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('product_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>                                        

                                        <div class="form-group{{ $errors->has('buyer') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Buyer:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="buyer"
                                                    value="{{ old('buyer', isset($data) ? $data->buyer : '') }}" required>

                                                @if ($errors->has('buyer'))
                                                    <span class="help-block">{{ $errors->first('buyer') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Order:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="order"
                                                    value="{{ old('order', isset($data) ? $data->order : '') }}" required>

                                                @if ($errors->has('order'))
                                                    <span class="help-block">{{ $errors->first('order') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('fabric_structure') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Fabric structure:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="fabric_structure"
                                                    value="{{ old('fabric_structure', isset($data) ? $data->fabric_structure : '') }}"
                                                    required>

                                                @if ($errors->has('fabric_structure'))
                                                    <span
                                                        class="help-block">{{ $errors->first('fabric_structure') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('composition') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Composition:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="composition"
                                                    value="{{ old('composition', isset($data) ? $data->composition : '') }}"
                                                    required>

                                                @if ($errors->has('composition'))
                                                    <span class="help-block">{{ $errors->first('composition') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Color:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="color"
                                                    value="{{ old('color', isset($data) ? $data->color : '') }}" required>

                                                @if ($errors->has('color'))
                                                    <span class="help-block">{{ $errors->first('color') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('dia') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Dia:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="dia"
                                                    value="{{ old('dia', isset($data) ? $data->dia : '') }}" required>

                                                @if ($errors->has('dia'))
                                                    <span class="help-block">{{ $errors->first('dia') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Date:</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                    value="{{ old('date', isset($data) ? $data->date : '') }}" required>

                                                @if ($errors->has('date'))
                                                    <span class="help-block">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('gsm') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Gsm:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="gsm"
                                                    value="{{ old('gsm', isset($data) ? $data->gsm : '') }}" required>

                                                @if ($errors->has('gsm'))
                                                    <span class="help-block">{{ $errors->first('gsm') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                            <label class="control-label col-sm-3 required">Quantity:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="quantity"
                                                    value="{{ old('quantity', isset($data) ? $data->quantity : '') }}"
                                                    required>

                                                @if ($errors->has('quantity'))
                                                    <span class="help-block">{{ $errors->first('quantity') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label
                                                class="control-label col-sm-3 {{ isset($edit) ? '' : 'required' }}">Image:(600
                                                by 600)</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="image"
                                                    onchange="readURL(this)" {{ isset($edit) ? '' : 'required' }}>

                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit"
                                                class="btn btn-success btn-flat btn-lg">{{ isset($edit) ? 'Update' : 'Create' }}</button>
                                            <button type="reset" class="btn btn-custom btn-flat btn-lg">Clear</button>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        {!! viewImg('swatch_cards', isset($data->image) ? $data->image : '', [
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
                        <form method="GET" action="{{ route('swatch-card.index') }}" class="form-inline">
                            <div class="box-header text-right">
                                <div class="row">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="q"
                                            value="{{ Request::get('q') }}" placeholder="Write your search text...">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-custom btn-flat">Search</button>
                                        <a class="btn btn-custom btn-flat" href="{{ route('swatch-card.index') }}">X</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Buyer</th>
                                        <th>Color</th>
                                        <th>Order</th>
                                        <th>Quantity</th>
                                        <th class="col-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $val)
                                        <tr>
                                            <td>{!! viewImg('swatch_card', $val->image, [
                                                'thumb' => 1,
                                                'popup' => 1,
                                                'style' => 'width:30px;',
                                                'fake' => 'fake',
                                            ]) !!}</td>
                                            <td>{{ $val->product->name }}</td>
                                            <td>{{ $val->buyer }}</td>
                                            <td>{{ $val->color }}</td>
                                            <td>{{ $val->order }}</td>
                                            <td>{{ $val->quantity }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-default btn-flat btn-xs dropdown-toggle"
                                                        type="button" data-toggle="dropdown">Action <span
                                                            class="caret"></span></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a
                                                                href="{{ route('swatch-card.show', $val->id) . qString() }}"><i
                                                                    class="fa fa-eye"></i> Show</a></li>
                                                        <li><a
                                                                href="{{ route('swatch-card.edit', $val->id) . qString() }}"><i
                                                                    class="fa fa-eye"></i> Edit</a></li>
                                                        <li><a
                                                                onclick="deleted('{{ route('swatch-card.destroy', $val->id) . qString() }}')"><i
                                                                    class="fa fa-close"></i> Delete</a></li>
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
                                                <option value="{{ qUrl(['limit' => $pag]) }}"
                                                    {{ $pag == Request::get('limit') ? 'selected' : '' }}>
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
