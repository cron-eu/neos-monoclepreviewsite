<?php

namespace CRON\MonoclePreviewSite\Controller;

use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Annotations as Flow;

/**
 * Controller to redirect to monocle preview module
 *
 * @Flow\Scope("singleton")
 */
class RedirectController extends ActionController
{
    public function redirectAction()
    {
        $this->redirect('index', 'Module', 'Sitegeist.Monocle');
    }
}

