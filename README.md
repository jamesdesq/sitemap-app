# Sitemap Application 

This is a Symfony application intended to be used alongside the serverless CMS apps I've been building. The purpose of the application is to serve sitemaps indexed out of Contentful.

## Notes

### Running it locally 

Run `symfony server:start`

###Symfony installation on EB: How to do it: 

- Set up your Symfony application
- Create an Elastic Beanstalk environment (we'll get to the databases bit later)
- Install EB and do EB init

This is how to get the initial repo set up: 

https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/php-symfony-tutorial.html

And this is how to get the thing automated: 

https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/eb-cli3-getting-started.html

## Some other stuff that I did

- You need to install the composer Apache pack
- You need to make sure that your EB install is indeed running Apache (and not Nginx), which you can do by changing the software settings via the console
- You need to make sure that EB has the /public route set as the home directory
- For CLI access, make sure you've got a key pair generated for the EC2 instance. Download the private key for it and put it in ~/.ssh. CHMOD it to 400
- You should then be able to do eb ssh your-instance --setup


 