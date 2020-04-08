@include('includes.header')

<body>
    @include('includes.nav')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="panel">
                <div class="panel-heading">
                    Текущие задачи
                </div>

                <div class="panel-body">
                    @foreach ($tasks as $task)
                    <a class="panel-block">
                        <button class="button is-rounded">
                            <span>{{ $task->name }}</span>
                        </button>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
<body>
</html>