@extends('layouts.app')

@section('game')
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                Guess Who
            </a>
        </div>
        <div class="play-button">
            <button>
                Play
            </button>
        </div>
    </nav>
    {{-- Start game --}}
    <div class="content">
        <div class="game">
            <div class="questions">
                <p class="asker">سيزو</p>
                <p class="question">اسأل</p>
                <p class="asked">اسلام</p>
            </div>
            <button class="next-button">التالي</button>
        </div>
    </div>
    <div class="players">
        <div class="player">
            <p class="name">مصطفي</p>
            <div class="points-container">
                <p class="points-number">5</p>
            </div>
        </div>
        <div class="player">
            <p class="name">حسن</p>
            <div class="points-container">
                <p class="points-number">3</p>
            </div>
        </div>
        <div class="player">
            <p class="name">كريم</p>
            <div class="points-container">
                <p class="points-number">2</p>
            </div>
        </div>
        <div class="player">
            <p class="name">اسلام</p>
            <div class="points-container">
                <p class="points-number">0</p>
            </div>
        </div>
        <div class="player">
            <p class="name">زوز</p>
            <div class="points-container">
                <p class="points-number">0</p>
            </div>
        </div>
        <div class="player">
            <p class="name">معتصم</p>
            <div class="points-container">
                <p class="points-number">0</p>
            </div>
        </div>
        <div class="player">
            <p class="name">سيزو</p>
            <div class="points-container">
                <p class="points-number">0</p>
            </div>
        </div>
    </div>
@endsection
