<?php
/**
 * @version     1.0.2
 * @package     com_student
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Gala <galina.ck@gmail.com> - http://
 */
// no direct access
defined('_JEXEC') or die;

$document =& JFactory::getDocument();
for ($i=0, $n=count( $items ); $i < $n; $i++)
{
$row =& $items[$i];

// load individual item creator class
$item = new JFeedItem();
$item->title = $row->title;
$item->link = $row->readmore;
$item->description = $row->introtext;
$item->author = $row->username;
$item->date = $row->fulldate;
$item->category = $row->tags;

// loads item info into rss array
$document->addItem( $item );
}

$link   = '&format=feed&limitstart=';
$attribs = array('type' => 'application/rss+xml',
'title' => 'RSS 2.0');
$document->addHeadLink(JRoute::_($link.'&type=rss'),
'alternate', 'rel', $attribs);
$attribs = array('type' => 'application/atom+xml',
'title' => 'Atom 1.0');
$document->addHeadLink(JRoute::_($link.'&type=atom'),
'alternate', 'rel', $attribs);