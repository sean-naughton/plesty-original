<?php

function createPlest($attributes = []) {
    $plest = factory(\App\Plest::class)->create($attributes);
    return $plest;
}

function createQuestion($attributes = []) {
    $question = factory(\App\Question::class)->create($attributes);
    return $question;
}