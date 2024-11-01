<?php

namespace wcf\system\event\listener;

use wcf\system\user\jcoins\UserJCoinsStatementHandler;
use wcf\system\WCF;

final class JCoinsTeamspeak3AddListener extends AbstractEventListener
{
    protected function onFinalizeAction($eventObj)
    {
        if (!MODULE_JCOINS || !WCF::getUser()->userID) {
            return;
        }

        if ($eventObj->getActionName() == 'create') {
            $paramas = $eventObj->getParameters();

            UserJCoinsStatementHandler::getInstance()->create('de.wcflabs.jcoins.statement.teamspeak3.start', null, [
                'userID' => $paramas['data']['userID'],
            ]);
        } elseif ($eventObj->getActionName() == 'delete') {
            foreach ($eventObj->getObjects() as $object) {
                UserJCoinsStatementHandler::getInstance()->revoke(
                    'de.wcflabs.jcoins.statement.teamspeak3.start',
                    $object->getDecoratedObject(),
                    [
                        'userID' => $object->userID,
                    ]
                );
            }
        }
    }
}
