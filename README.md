## FediFur.com

Reduce cognitive load for Furry Fediverse onboarding by having our website choose a random instance for you!

## How It Works

1. Furry Fediverse instances opt-in to being included in the collection.
2. Every day, visiting https://fedifur.com will redirect you to the registration form for a different furry fediversee
   instance, based on your IP address.

## How to Contribute

To add a new instance to fedifur.com, first you need to have the instance owner's permission.

### Technical Users

If you know what "git" is, just make a pull request that changes `data/instances.php`. It should be straightforward.

### Non-Technical Users

If you don't, first, make a [GitHub.com](https://github.com) account, then go to [this specific link](https://github.com/soatok/fedifur.com/edit/main/data/instances.php).

You'll be asked about forking. Go ahead and press the green "Fork this repository" button.

You'll see a bunch of lines that look like this:

```php
    ->addMastodon('example.com')
    ->addMastodon('example.net')
    ->addMastodon('example.org')
    ->addOther('foo.com', '/bar/baz/qux')
    ->addMastodon('example.org')
```

After all of those existing lines, add a new line that begins with `->addMastodon`, followed by an open paren, then a
single quote character (`'`). Then type your domain name. Add another single quote character. Then a right paren.

It should end up looking like the other lines above it (just with your domain, not theirs).

When you're done, you can press the green button to save your changes.

Once your changes are saved, you will be asked to create a pull request from your changes. Do that.

Once the pull request is created and submitted, Soatok will review it and merge if appropraite.

