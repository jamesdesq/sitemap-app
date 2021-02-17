# Sitemap Application 

This is a simple Symfony application intended to be used alongside the serverless CMS apps I've been building. The purpose of the application is to serve sitemaps indexed out of Contentful. In particular, you might want to use an approach like this if you've got multiple content sources that you're using on a single site.

## Running it locally 

1. Clone the repository

2. Run `composer install`

3. Create at least one .env file. You'll need variables for SPACE and ACCESS_TOKEN, which you'll find in your Contentful account

4. Run `symfony server:start`

## Find out more

I'm using this to generate the sitemap at https://jamesdodd.org/sitemap.xml. 

The bulk of the site is written in Angular Universal, and it gets its content from Contentful. However, the sitemap app is hosted on an AWS EC2 instance.

You can find out more about how I did it in [this guide I wrote](https://jamesdodd.org/symfony-elastic-beanstalk).



 