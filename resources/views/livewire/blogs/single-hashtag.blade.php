<div>
    <p>{{$hashtag->name}}</p>
    @foreach ($blogs as $blog)
        <p>{{$blog->title}}</p>
    @endforeach
</div>
