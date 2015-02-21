Itabs_LogViewer
===============

This extension provides the possibility to view log files in the backend.

Facts
-----
- Version: 1.0.0
- [extension on GitHub](https://github.com/itabs/Itabs_LogViewer)

Compatibility
-------------
- Magento >= 1.6

Installation Instructions
-------------------------

#### Manually

- Clone the repository or download the latest version of this extension
- Copy all the files from the **src** folder into your Magento document root

#### Via modman

- Install [modman](https://github.com/colinmollenhour/modman) on your system
- Run the following command in your Magento document root:

`modman clone https://github.com/itabs/Itabs_LogViewer.git`

#### Via composer

- Install [composer](http://getcomposer.org/download/) on your system
- Install [Magento Composer](https://github.com/magento-hackathon/magento-composer-installer) or any other Magento composer installer
- Create a composer.json into your project like the following sample:

```json
{
    "require": {
        "itabs/logviewer":"*"
    },
    "repositories": [
	    {
            "type": "composer",
            "url": "http://packages.firegento.com"
        }
    ],
    "extra":{
        "magento-root-dir": "htdocs/"
    }
}
```

- From your `composer.json` folder run `php composer.phar install` or `composer install`

#### Final steps

- Clear the cache, logout from the admin panel and then log back in
- You can now view the log files in the backend under *System -> LogViewer*

Uninstallation
--------------
- Remove all extension files from your Magento installation:

```
app/code/community/Itabs/LogViewer
app/design/adminhtml/default/default/layout/itabs/logviewer.xml
app/design/adminhtml/default/default/template/itabs/logviewer
app/etc/modules/Itabs_LogViewer.xml
app/locale/de_DE/Itabs_LogViewer.csv
skin/adminhtml/default/default/itabs/logviewer
```

- Via modman: `modman remove Itabs_LogViewer`
- Via composer, remove the requirement of `itabs/logviewer`

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/itabs/Itabs_LogViewer/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Rouven Alexander Rieker / ITABS GmbH
- [http://www.itabs.de](http://www.itabs.de)
- [@therouv](https://twitter.com/therouv)
- [@itabs_gmbh](https://twitter.com/itabs_gmbh)

License
-------
[MIT](http://opensource.org/licenses/MIT) - For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
