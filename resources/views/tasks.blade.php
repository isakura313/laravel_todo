@extends('layouts.app')

@section('content')
<div class="columns is-centered">
    <div class="column is-half">
        <div class="panel">
            <div class="panel-heading">
                Новое дело
            </div>

            <div class="panel-block">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- Форма для создания тасков -->
                <form action="{{ url('task')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="task-name" class="label is-medium">Дело</label>
                        <input type=" text" name="name" id="task-name" class="input is-medium"
                            value="{{ old('task') }}">

                    </div>

                    <!-- Add Task Button -->
                    <div class="field">
                        <button type="submit" class="button is-success">
                            <span class="icon">
                                <i class="fa fa-btn fa-plus">
                            </span></i>
                            <span>Добавить дело</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        @if (count($tasks) > 0)
        <div class="panel">
            <div class="panel-heading">
                Текущие задачи
            </div>

            <div class="panel-body">
                {{-- <table class="table table-striped task-table">
                    <thead>
                        <th>Дело</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody> --}}
                @foreach ($tasks as $task)
                <a class="panel-block">
                    <button class="button is-rounded">
                    <span>{{ $task->name }}</span>
                </button>


                    <!-- Task Delete Button -->

                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="button is-danger">

                            <span class="icon is-small"> <i class="fa fa-btn fa-trash"></i></span>
                            <span> Удалить </span>
                        </button>
                    </form>
                </a>
                @endforeach


            </div>
        </div>
        @endif
    </div>
</div>
@endsection