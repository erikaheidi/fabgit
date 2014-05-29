fabgit
======

Because Git is awesome, but it can be FABULOUS!

<strong>fabgit</strong> uses the amazing <a href="https://github.com/whatthejeff/fab">whatthejeff/fab</a> library to make your git output look fabulous.

You can use it in the same way you use composer - save the phar file it to your /usr/bin as 'fabgit' and it shall be available system-wide as a command, or use as `php fabgit.phar [your git commands]`

Installation
=============

You only need the fabgit.phar file.

```
curl -O http://erikaheidi.github.io/fabgit/fabgit.phar
chmod +x fabgit.phar
sudo cp fabgit.phar /usr/sbin/fabgit
```

And it shall be available globally.

`fabgit`

<img src="http://i.imgur.com/iJ645gO.png"/>

Contribute / Customize
======================

You can contribute or make your own customizations, just clone the repo and have fun! :)
Head to the `src/fab.php` and build your .phar file using the `build/build.php`.
