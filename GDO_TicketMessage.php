<?php
namespace GDO\Helpdesk;

use GDO\Comments\GDO_CommentTable;
use GDO\Core\GDO;

/**
 * Helpdesk ticket message.
 *
 * @author gizmore
 */
final class GDO_TicketMessage extends GDO_CommentTable
{

	public function gdoCommentedObjectTable(): GDO { return GDO_Ticket::table(); }

}
