# Festival
## [![build status](https://gitlab.com/dealloc/festival/badges/master/build.svg)](https://gitlab.com/dealloc/festival/commits/master) [![Build Status](https://travis-ci.com/dealloc/festival.svg?token=xoXJiPAQifRB12iswoW2&branch=master)](https://travis-ci.com/dealloc/festival) [![HHVM tested](https://img.shields.io/badge/HHVM-tested-brightgreen.svg)]()  ![license](https://img.shields.io/badge/license-BSD--4-blue.svg)

## Roadmap ![Progressbar](http://progressed.io/bar/46)
 - [X] Newsfeed
	 - [X] Can post new items on newsfeed
	 - [X] users can comment on newsitems
 - [ ] line-up page
	 - [X] can add new artists on lineup
	 - [X] each artist has a photo, name, description and a daterange they perform
	 - [ ] lineup shows photo and name of artist, on hover shows description and hour
 - [ ] contact page
 	- [X] contact messages are emailed to administrators
 - [ ] ticket purchase workflow
 	- [X] get all tickets of the user
 - [ ] authorization
	 - [X] normal users can comment
	 - [X] admins can add artists
	 - [X] admins can add news items
 - [ ] authentication
	 - [X] users can register
	 - [X] users need to authenticate for commenting
	 - [X] users need to authenticate for purchasing ticket
	 - [X] user has first name, last name and email address
 - [ ] CRUD
 	 - [ ] Artist
 	 - [ ] NewsItem
 	 - [ ] Ticket
 	 - [ ] User
 	 	- [ ] Comments
 - [ ] document code
 - [ ] cover (most) functionality using black box unit tests
 - [ ] design the emails

## Requirements
 - [Laravel requirements](https://laravel.com/docs/5.2#server-requirements)
	 - PHP >= 5.5.9 (application was developed on 7.0.5)
	 - OpenSSL PHP Extension
	 - PDO PHP Extension
	 - Mbstring PHP Extension
	 - Tokenizer PHP Extension
 - [NodeJS && NPM](https://nodejs.org)
 	- Gulp (installed globally)
 - PHPUnit (to run unit tests)

## Instal instructions
 - Clone from [Github](http://github.dealloc.be)
 - run ``` npm install ```
 - copy and modify ``` .env.example ``` to ``` .env ```
 - run ``` php artisan migrate --seed ```

You can run the application by executing the ``` php artisan serve ``` command.

## Acknowledgements
This software contains (parts of) software written by other authors.
All software is the property of the respective author.
This software is not endorsed or acknowledged by any of above authors unless explicitly mentioned otherwise.

## License (BSD-4)

Copyright (c) 2016 Wannes Gennar. All rights reserved.
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

3. All advertising materials mentioning features or use of this software must display the following acknowledgement:
This product includes software developed by Wannes Gennar.

4. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY WANNES GENNAR "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL WANNES GENNAR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
