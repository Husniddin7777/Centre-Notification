<?php

namespace App\HttpRepositories\Notification;

use App\DTOs\Notifications\StoreNotificationsDTO;

interface EmailHttpRepositoryInterface
{
    /**
     * @param StoreNotificationsDTO $storeNotificationsDTO
     * @return mixed
     */

    public function sendNotification(StoreNotificationsDTO $storeNotificationsDTO);

}




