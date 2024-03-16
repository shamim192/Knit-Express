@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">


                @if (isset($create))
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-edit" aria-hidden="true"></i> Add Metas
                        </a>
                    </li>
                @endif

                @if (isset($edit))
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-edit" aria-hidden="true"></i> Edit Metas
                        </a>
                    </li>
                @endif
            </ul>

            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="box-body">
                        <form method="POST"
                            action="{{ isset($edit) ? route('admin-home.update', $edit) : route('admin-home.store') }}{{ qString() }}"
                            id="are_you_sure" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            @if (isset($edit))
                                @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-sm-8">

                                    <h3 class="col-sm-9 col-sm-offset-3">Home
                                        <hr />
                                    </h3>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_title"
                                                value="{{ old('meta_title', isset($data) ? $data->meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_keywords"
                                                value="{{ old('meta_keywords', isset($data) ? $data->meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="meta_description" rows="6">{{ old('meta_description', isset($data) ? $data->meta_description : '') }}</textarea>
                                        </div>
                                    </div>




                                    {{-- About --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">About
                                        <hr />
                                    </h3>
                                    <div class="form-group{{ $errors->has('about_banner_img') ? ' has-error' : '' }}">
                                        <label class="control-label col-sm-3 {{ isset($edit) ? '' : 'required' }}">Banner
                                            Image:</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="about_banner_img"
                                                {{ isset($edit) ? '' : 'required' }}>

                                            @if ($errors->has('about_banner_img'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('about_banner_img') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="about_meta_title"
                                                value="{{ old('about_meta_title', isset($data) ? $data->about_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="about_meta_keywords"
                                                value="{{ old('about_meta_keywords', isset($data) ? $data->about_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="about_meta_description" rows="6">{{ old('about_meta_description', isset($data) ? $data->about_meta_description : '') }}</textarea>
                                        </div>
                                    </div>


                                    {{-- Team --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Team
                                        <hr />
                                    </h3>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="team_meta_title"
                                                value="{{ old('team_meta_title', isset($data) ? $data->team_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="team_meta_keywords"
                                                value="{{ old('team_meta_keywords', isset($data) ? $data->team_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="team_meta_description" rows="6">{{ old('team_meta_description', isset($data) ? $data->team_meta_description : '') }}</textarea>
                                        </div>
                                    </div>



                                    {{-- Career --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Career
                                        <hr />
                                    </h3>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="career_meta_title"
                                                value="{{ old('career_meta_title', isset($data) ? $data->career_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="career_meta_keywords"
                                                value="{{ old('career_meta_keywords', isset($data) ? $data->career_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="career_meta_description" rows="6">{{ old('career_meta_description', isset($data) ? $data->career_meta_description : '') }}</textarea>
                                        </div>
                                    </div>


                                    {{-- Contact --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Contact
                                        <hr />
                                    </h3>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_meta_title"
                                                value="{{ old('contact_meta_title', isset($data) ? $data->contact_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_meta_keywords"
                                                value="{{ old('contact_meta_keywords', isset($data) ? $data->contact_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="contact_meta_description" rows="6">{{ old('contact_meta_description', isset($data) ? $data->contact_meta_description: '') }}</textarea>
                                        </div>
                                    </div>


                                    {{-- Projects --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Projects
                                        <hr />
                                    </h3>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="project_meta_title"
                                                value="{{ old('project_meta_title', isset($data) ? $data->project_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="project_meta_keywords"
                                                value="{{ old('project_meta_keywords', isset($data) ? $data->project_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="project_meta_description" rows="6">{{ old('project_meta_description', isset($data) ? $data->project_meta_description : '') }}</textarea>
                                        </div>
                                    </div>




                                    {{-- Media --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Media
                                        <hr />
                                    </h3>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="media_meta_title"
                                                value="{{ old('media_meta_title', isset($data) ? $data->media_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="media_meta_keywords"
                                                value="{{ old('media_meta_keywords', isset($data) ? $data->media_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="media_meta_description" rows="6">{{ old('media_meta_description', isset($data) ? $data->media_meta_description : '') }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Gallery --}}
                                    <h3 class="col-sm-9 col-sm-offset-3">Gallery
                                        <hr />
                                    </h3>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Title:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="gallery_meta_title"
                                                value="{{ old('gallery_meta_title', isset($data) ? $data->gallery_meta_title : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Keyword:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="gallery_meta_keywords"
                                                value="{{ old('gallery_meta_keywords', isset($data) ? $data->gallery_meta_keywords : '') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3 required">Meta Description:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="gallery_meta_description" rows="6">{{ old('gallery_meta_description', isset($data) ? $data->gallery_meta_description : '') }}</textarea>
                                        </div>
                                    </div>



                                    <div class="form-group text-center">
                                        <button type="submit"
                                            class="btn btn-success btn-flat btn-lg">{{ isset($edit) ? 'Update' : 'Create' }}</button>
                                        <button type="reset" class="btn btn-custom btn-flat btn-lg">Clear</button>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

