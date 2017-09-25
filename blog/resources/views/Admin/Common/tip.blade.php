
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('msg'))
    <script>
        layer.msg('{{ session("msg") }}',{icon:1,time:1500});
    </script>
@endif

@if (session('errorTip'))
    <script>
        layer.msg('{{ session("errorTip") }}',{icon:2,time:1500});
    </script>
@endif
