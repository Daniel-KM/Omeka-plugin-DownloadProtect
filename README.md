Download Protect (plugin for Omeka Classic)
===========================================

[Download Protect] is a plugin for [Omeka] that protects original files with a
copyright warning before download and avoids file hotlinking.

If you use the plugin [Archive Repertory], this plugin is useless.


Installation
------------

Uncompress files and rename plugin folder `DownloadProtect`.

Then install it like any other Omeka plugin and follow the config instructions.


Protecting your files
---------------------

This plugin simplifies direct access to your files. That’s not a main issue if
they are in public domain or you don’t care about hotlinking and bandwidth
theft.

Anyway, if you want to protect them, you can adapt the following code to your
needs in the root `.htaccess` file, or in a `.htaccess` file in the "files"
folder or in the "files/original" folder:

```
Options +FollowSymlinks
RewriteEngine on

# In some cases, the flag [R] may be needed too.
RewriteRule ^files/original/(.*)$ http://www.example.com/download/files/original/$1 [NC,L]
```

You can adapt `routes.ini` as you wish too.

In this example, all original files will be protected: a check will be done by
the plugin before to deliver files. If the size of the file is bigger than a
specified size set in the configuration page, a confirmation page will be
displayed.

The file type is "original" by default, but other ones (fullsize…) can be
used. Note that if a confirmation is needed for fullsize images, the site may be
unusable.

The "mode" argument in `routes.ini` allows to set the download mode:
"inline" (default if no confirmation), "attachment" (always when a confirmation
is needed), "size", "image" or "image-size", according to your needs.


Warning
-------

Use it at your own risk.

It’s always recommended to backup your files and your databases and to check
your archives regularly so you can roll back if needed.


Troubleshooting
---------------

See online [issues] on GitHub.


License
-------

This plugin is published under the [CeCILL v2.1] licence, compatible with
[GNU/GPL] and approved by [FSF] and [OSI].

In consideration of access to the source code and the rights to copy, modify and
redistribute granted by the license, users are provided only with a limited
warranty and the software’s author, the holder of the economic rights, and the
successive licensors only have limited liability.

In this respect, the risks associated with loading, using, modifying and/or
developing or reproducing the software by the user are brought to the user’s
attention, given its Free Software status, which may make it complicated to use,
with the result that its use is reserved for developers and experienced
professionals having in-depth computer knowledge. Users are therefore encouraged
to load and test the suitability of the software as regards their requirements
in conditions enabling the security of their systems and/or data to be ensured
and, more generally, to use and operate it in the same conditions of security.
This Agreement may be freely reproduced and published, provided it is not
altered, and that no provisions are either added or removed herefrom.


Copyright
---------

* Copyright Daniel Berthereau, 2012-2019

First version of this plugin was built for [Bibliothèqe de Paris I Sorbonne].


[Download Protect]: https://github.com/Daniel-KM/Omeka-plugin-DownloadProtect
[Archive Repertory]: https://github.com/Daniel-KM/Omeka-plugin-ArchiveRepertory
[Omeka]: https://omeka.org
[issues]: https://github.com/Daniel-KM/Omeka-plugin-DownloadProtect/issues
[CeCILL v2.1]: https://www.cecill.info/licences/Licence_CeCILL_V2.1-en.html
[GNU/GPL]: https://www.gnu.org/licenses/gpl-3.0.html
[FSF]: https://www.fsf.org
[OSI]: http://opensource.org
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"
[Bibliothèqe de Paris I Sorbonne]: https://nubis.univ-paris1.fr
