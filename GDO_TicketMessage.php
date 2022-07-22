<?php
namespace GDO\Helpdesk;
use GDO\Comments\GDO_CommentTable;
/**
 * Helpdesk ticket message.
 * @author gizmore
 */
final class GDO_TicketMessage extends GDO_CommentTable
{
    public function gdoCommentedObjectTable() { return GDO_Ticket::table(); }
}
