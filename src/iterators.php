<?php

$items = ['a', 'b', 'c', 'd', 'e', 'f', '...'];

function stepGenerator(array $array, int $step): Generator
{
    for ($i = 0; $i < count($array); $i=$i+$step) {
        yield $array[$i];
    }
}

foreach (stepGenerator(range(1, 20), 5) as $item) {
    echo $item."\n";
}

$articles = [
    ['title' => 'article Politique 1', 'category' => 'politique'],
    ['title' => 'B', 'category' => 'eco'],
    ['title' => 'C', 'category' => 'sport'],
    ['title' => 'article Politique 2', 'category' => 'politique'],
];

function articleFilterGenerator (array $articles, $criteria) {
    foreach ($articles as $article) {
        if ($criteria === $article['category']) {
            yield $article;
        }
    } 
}

foreach (articleFilterGenerator($articles, 'sport') as $item) {
    echo $item['title']."\n";
}