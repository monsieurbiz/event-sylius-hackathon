# Sylius Hackathon Event repo

This repository is the source of the website for the Sylius Hackathon Event.

It is hosted by Clever Cloud.

## How to contribute?

1. Requirements: PHP 8.3 and composer.
2. Create a `.env.local` file, and set the `GITHUB_TOKEN` env with a Github token, so the Github API will work properly. [You can generate one in your account](https://github.com/settings/personal-access-tokens/new).
3. Run `make`!

## How does it work?

Just update the `INDEX.md` file, and run `make` to generate the `generated/index.html` file.

Then serve the `public/` directory with your favorite web server.  
You can also run `make serve` to start the symfony local web server.
