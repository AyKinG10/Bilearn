<form method="POST" action="{{ route('game.store') }}">
    @csrf
    <label for="question_text">Сұрақтар:</label>
    <input type="text" name="question" required>

    <label for="answer">Жауаптар:</label>
    <input type="text" name="answer" required>
    <button type="submit">Сақтау</button>
</form>
