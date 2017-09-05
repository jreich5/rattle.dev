{!! csrf_field() !!}
<div class="form-group @if($errors->has('title')) has-error @endif">
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    <label for="title">Post Title</label>
    <input 
        class="form-control" 
        type="text" 
        name="title" 
        placeholder="Enter post title" 
        @if(isset($post->title))
            value="{{ $post->title }}"
        @else
            value="{{ old('title') }}"
        @endif 
    >
</div>
<div class="form-group @if($errors->has('url')) has-error @endif"">
    {!! $errors->first('url', '<span class="help-block">:message</span>') !!}
    <label for="url">Post Url</label>
    <input 
        class="form-control" 
        type="text" 
        name="url" 
        placeholder="Enter post URL"
        @if(isset($post->url))
            value="{{ $post->url }}"
        @else
            value="{{ old('url') }}"
        @endif 
    >
</div>
<div class="form-group @if($errors->has('content')) has-error @endif"">
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
    <label for="content">Post Content</label>
    <textarea 
        class="form-control" 
        name="content" 
        cols="50" 
        rows="10" 
        placeholder="Please enter content"
    >@if(isset($post->content)){{ $post->content }}@else{{ old('content') }}@endif</textarea>
</div>