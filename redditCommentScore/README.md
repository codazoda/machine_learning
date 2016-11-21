# Reddit Comment Score

## Goal

Determine if a comment will have a high or low karma score based on the content of that comment before hitting submit.

## Factors

Some of these factors might or might not be important.

- How old is the post when the comment is submitted? (increased difficulty)
- Includes a URL? (calculated)
- Includes swear words? (calculated)
- How many characters? (count)
- How many words? (count)
- What specific words appear in highly voted comments?
- Was the comment serious or not serious? (increased difficulty)
- Was the comment marked as sarcasm? (contains sarcasm /s tag)

Although I suspect the age of the original post is a big factor, getting that date requires an extra request for each comment. That makes it a lot more expensive process so I'll exclude the factor for now.

These factors, in combination with the ones above, probably matter as well, but I don't think I have enough data for these or don't want to include them for some other reason.

- What subreddit was it in? (Maybe you know more about higher rated subreddits)