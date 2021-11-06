<?php

namespace Ashiful\Installer\Controllers;

use Illuminate\Routing\Controller;
use Ashiful\Installer\Events\LaravelInstallerFinished;
use Ashiful\Installer\Helpers\EnvironmentManager;
use Ashiful\Installer\Helpers\FinalInstallManager;
use Ashiful\Installer\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Ashiful\Installer\Helpers\InstalledFileManager $fileManager
     * @param \Ashiful\Installer\Helpers\FinalInstallManager $finalInstall
     * @param \Ashiful\Installer\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
