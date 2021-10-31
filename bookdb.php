<?php
//
// Book "database" contains books and authors linked by "key" number.
// It's not normalized, the relationships are held in books.
//

$authors = [
    111 => [ 'name' => 'Anne McCaffrey',
             'born' => 1926,
             'image' => 'anne_mccaffrey.jpg',
           ],

    112 => [ 'name' => 'Terry Pratchett',
             'born' => 1948,
             'image' => 'terry_pratchett.jpg',
           ],

    113 => [ 'name' => 'Neil Gaiman',
             'born' => 1960,
             'image' => 'neil_gaiman.jpg',
           ],

    114 => [ 'name' => 'Diana Wynne Jones',
             'born' => 1934,
             'image' => 'diana_wynne_jones.jpg',
           ],
];

$books = [
    3001 => [ 'title' => 'Charmed Life',
              'published' => 1977,
              'authors' => [114],
              'image' => 'charmed_life.jpg',
            ],
    3002 => [ 'title' => 'Howl\'s Moving Castle',
              'published' => 1986,
              'authors' => [114],
              'image' => 'howls_moving_castle.jpg',
            ],
    3003 => [ 'title' => 'The Ship Who Sang',
              'published' => 1969,
              'authors' => [111],
              'image' => 'the_ship_who_sang.jpg',
            ],
    3004 => [ 'title' => 'Dragonflight',
              'published' => 1968,
              'authors' => [111],
              'image' => 'dragonflight.jpg',
            ],
    3005 => [ 'title' => 'Stardust',
              'published' => 1998,
              'authors' => [113],
              'image' => 'stardust.jpg',
            ],
    3006 => [ 'title' => 'Good Omens',
              'published' => 1990,
              'authors' => [113,112],
              'image' => 'good_omens.jpg',
            ],
    3007 => [ 'title' => 'Color of Magic',
              'published' => 1983,
              'authors' => [112],
              'image' => 'color_of_magic.jpg',
            ],
];

// Then let's further "de-normalize" this for ease of use by adding
// the book relationships to the authors.

foreach ($books as $book_id => $book) {
    foreach ($book['authors'] as $author_id) {
        $author = &$authors[$author_id];
        if (!isset($author['books'])) $author['books'] = [];
        array_push($author['books'], $book_id);
        unset($author); // Unset the reference footgun.
    }
}
