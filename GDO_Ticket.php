<?php
namespace GDO\Helpdesk;

use GDO\Comments\CommentedObject;
use GDO\Core\GDO;
use GDO\Core\GDT_AutoInc;
use GDO\Core\GDT_CreatedAt;
use GDO\Core\GDT_CreatedBy;
use GDO\Date\GDT_DateTime;
use GDO\UI\GDT_Title;
use GDO\User\GDO_User;
use GDO\User\GDT_User;
use function foo\func;

/**
 * Helpdesk ticket.
 * Use Comment module for messaging.
 *
 * @author gizmore
 */
final class GDO_Ticket extends GDO
{

	use CommentedObject;

	public function gdoCommentTable() { return GDO_TicketMessage::table(); }

	public function gdoTableName(): string { return 'gdo_helpdesk_ticket'; }

	public function gdoColumns(): array
	{
		return [
			GDT_AutoInc::make('ticket_id'),
			GDT_Title::make('ticket_title')->max(96),
			# Customer
			GDT_CreatedAt::make('ticket_created_at'),
			GDT_CreatedBy::make('ticket_created_by'),
			# Worker
			GDT_DateTime::make('ticket_claimed_at'),
			GDT_User::make('ticket_claimed_by'),
			# Closed
			GDT_DateTime::make('ticket_closed_at'),
			GDT_User::make('ticket_closed_by'),
		];
	}

	##############
	### Getter ###
	##############
	public function getTitle() { return $this->gdoVar('ticket_title'); }

	/**
	 * @return GDO_User
	 */
	public function getCreator() { return $this->gdoValue('ticket_created_by'); }

	public function getCreatedAt() { return $this->gdoVar('ticket_created_at'); }

}
