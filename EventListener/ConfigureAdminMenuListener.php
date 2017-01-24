<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 16/01/17
 * Time: 2:11 PM
 */

namespace Viweb\NewsBundle\EventListener;


use Viweb\SystemBundle\Event\ConfigureAdminMenuEvent;

class ConfigureAdminMenuListener
{
    public function onMenuConfigure(ConfigureAdminMenuEvent $event)
    {
        $menu = $event->getMenu();
        $menu->addChild('Nouvelles', ['route' => 'viweb_admin_news_index']);
        $menu->getChild('Nouvelles')
            ->addChild('Categories', ['route' => 'viweb_admin_news_category_index']);

    }

}