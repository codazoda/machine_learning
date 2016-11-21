<?php

// Make sure there is one command line argument
if ($argc != 2) {
    die("Syntax: php getRedditComments.php <username>\n");
}

// Grab the first command line argument as the reddit username
$redditUser = $argv[1];

// If this username has already been downloaded
if (file_exists($redditUser . '.tmp')) {
    // Say we're using the cached file
    echo 'Using cached file ' . $redditUser . ".tmp\n";
} else {
    // Download the feed from reddit and save it to a cache file
    echo "Downloading feed from reddit\n";
    $redditFeedUrl = 'https://www.reddit.com/user/' . $redditUser . '.json?limit=100';
    file_put_contents($redditUser . '.tmp', fopen($redditFeedUrl, 'r'));
}

// Read the XML data from the cache file
$redditJsonData = file_get_contents($redditUser . '.tmp');

$redditComments = json_decode($redditJsonData);

// Loop through the reddit comments
foreach ($redditComments->data->children as $redditComment) {
    // If this is a comment (t1) look at it
    if ($redditComment->kind === 't1') {
        $singleComment = $redditComment->data;
        echo "--- Score:   " . $singleComment->score . "\n";
        echo "--- Created: " . $singleComment->created_utc . "\n";
        echo "--- Parent ID: " . $singleComment->parent_id . "\n";
        echo $singleComment->body . "\n";
    }
}

echo "\n" . count($redditComments->data->children) . " Total Comments\n";
