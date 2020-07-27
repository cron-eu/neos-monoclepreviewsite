Monocle Preview Site
====================

This is simply an empty neos-site to be able to preview monocle styleguides
provided in neos-packages.

Just require this package and you get:

- Monocle dependency installed
- Styleguides from your neos-packages rendered (else you get an exception about a
  missing site)
- A routing from "/" to the monocle preview backend

Some pieces of this might be obsoleted in later versions of Monocle. See:
- https://github.com/sitegeist/Sitegeist.Monocle/issues/115
- https://github.com/sitegeist/Sitegeist.Monocle/issues/109

Usage in CI
-----------

You have a frontend neos-package and want to use Monocle in CI, this might help
to get you started (instead of creating a dummy "base distribution").

Your package doesn't even need to require Monocle (as you won't need it in
production anyway):

```json
{
  "name": "vendor/your-frontend-package",
  "type": "neos-package",
  "require": {
    "neos/neos": "^4.3",
    "neos/fusion-afx": "^1.4",
    "packagefactory/atomicfusion-proptypes": "^1.3"
  },
  ...
  "scripts": {
    "post-cmds": [
      "Neos\\Flow\\Composer\\InstallerScripts::postUpdateAndInstall",
      "rm -rf Packages/Application/CRON.DavPtaheute.Frontend && mkdir -p Packages/Application/ && ln -s ../../ Packages/Application/CRON.DavPtaheute.Frontend"
    ],
    "post-update-cmd": "@post-cmds",
    "post-install-cmd": "@post-cmds",
    "post-package-update": "Neos\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall",
    "post-package-install": "Neos\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall"
  }
}
```

Now you can do this in CI:

```
composer require "cron/neos-monoclepreviewsite"
```

And you will get a fully working Monocle installation ready to use.
