<?php
namespace GDO\Helpdesk;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_Checkbox;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;

/**
 * Helpdesk ticket module.
 *
 * @version 6.10
 * @since 6.10
 * @author gizmore
 */
final class Module_Helpdesk extends GDO_Module
{

	##############
	### Module ###
	##############
	public function getDependencies(): array
	{
		return ['Comments'];
	}

	public function onLoadLanguage(): void
	{
		$this->loadLanguage('lang/helpdesk');
	}

	public function getClasses(): array
	{
		return [
			GDO_Ticket::class,
			GDO_TicketMessage::class,
		];
	}

	##############
	### Config ###
	##############
	public function getConfig(): array
	{
		return [
			GDT_Checkbox::make('helpdesk_attachments')->initial('1'),
			GDT_Checkbox::make('hook_right_bar')->initial('1'),
		];
	}

	public function onInitSidebar(): void
	{
//         if ($this->cfgHookRightBar())
		{
			$bar = GDT_Page::$INSTANCE->rightBar();
			$bar->addField(GDT_Link::make('link_helpdesk')->href(href('Helpdesk', 'OpenTicket')));
		}
	}

	public function cfgAttachments() { return $this->getConfigValue('helpdesk_attachments'); }

	############
	### Init ###
	############

	public function cfgHookRightBar() { return $this->getConfigValue('hook_right_bar'); }

}
