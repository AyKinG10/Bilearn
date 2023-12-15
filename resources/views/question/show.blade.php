@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="open-book-container">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- Изображение курса -->
                                <img src="{{ $question->image }}" alt="Wallpaper" width="300"  height="400px">
                            </div>
                            <div class="col-md-6">
                                <div class="book-content">
                                    <!-- Заголовок и цена -->
                                    <header class="text-center">
                                        <h1 class="display-4">{{ $question->title }}</h1>
                                    </header>
                                    <!-- Описание курса -->
                                    <article>
                                        <p class="text-justify">{{ $question->content }}</p>
                                    </article>
                                    <div class="mt-2">
                                        <a href="">{{ $question->user->name }}</a>
                                    </div>

                                </div>

                            </div>
                            <form action="{{ route('question.destroy', $question->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>

                        <div class="mt-4">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Add a Answer</h5>
                                        <form class="form-group" action="{{route('answer.store')}}" method="post">
                                            @csrf
                                            <textarea class="form-control" rows="4" name="answer" placeholder="Type your answer here..."></textarea>
                                            <input type="hidden" value="{{$question->id}}" name="question_id">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <ul class="list-group">
                            <li class="row">
                            @foreach($answers as $answer)
                                <li class="list-group-item">
                                    <p>{{$answer->answer}}</p>
                                    <p>{{$answer->user->name}}</p>
                                </li>
{{--                                <form action="{{route('comments.destroy',$answer->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-primary" type="submit">DELETE</button>--}}
{{--                                </form>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
