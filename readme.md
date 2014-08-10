## Laravel 4.1 Application - Pet Flyer generator

### Features

This is the source of http://petlost.eu.  A fork/extension to the original of http://missingpetflyer.com

This application allows the users to upload a picture of a missing pet and create a poster of missing pet with custom text, without using MS Word or other poster making tools. 
It works on mobile - iOS 6 and Android devices and allows cropping of images by selecting the area of the image before previewing the poster.
A QR code of a business card will be inserted, for people with smartphones it is just a click away to contact you back without having to type your details up.

This application was originally created in celebration of Laravel 4 release. Please follow me on Twitter for more Laravel info : http://twitter.com/msurguy and my blog at http://maxoffsky.com 

We took the liberty to fork this great idea to play around in Laravel 4.1.  We upgraded and added some more functionality like QR code.

### Includes

- Laravel (4.1)
	- [Official Documentation](http://laravel.com) (Version 4.1)
- Customized Twitter Bootstrap 2.3.2
- Custom icon font created with Fontello.com
- PagodaBox Boxfile
	- Configured for PHP 5.3.23 with mcrypt, apc and several other extensions
	- Redis cache for session and cache storage
 	- L4 configuration to match database environment variables and leverage redis
- Composer
 	- deploy.sh script which automates wiping and re-composing (wipe vendor, reinstall / update composer)
 	- deploy.sh uses --prefer-source so NO MORE 403 limit exceeded!!

### License

[MIT license](http://opensource.org/licenses/MIT)
