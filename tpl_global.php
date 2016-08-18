<?php
/**
 * DokuWiki Bootstrap3 Template: Global Configurations
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

global $ID;
global $JSINFO;
global $INPUT;
global $ACT;
global $EVENT_HANDLER;

// Get the template info (useful for debug)
if ($INFO['isadmin'] && $INPUT->str('do') && $INPUT->str('do') == 'check') {
  $template_info = confToHash(dirname(__FILE__).'/template.info.txt');
  msg('bootstrap3 template version: v' . $template_info['date'], 1, '', '', MSG_ADMINS_ONLY);
}

$EVENT_HANDLER->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', null, 'bootstrap3_metaheaders');

$page_on_panel = bootstrap3_conf('pageOnPanel');

// Populate JSINFO object
$JSINFO['bootstrap3'] = array(
  'mode'   => $ACT,
  'config' => array(
    'tagsOnTop'           => (int) bootstrap3_conf('tagsOnTop'),
    'collapsibleSections' => (int) bootstrap3_conf('collapsibleSections'),
    'tocCollapseOnScroll' => (int) bootstrap3_conf('tocCollapseOnScroll'),
    'tocAffix'            => (int) bootstrap3_conf('tocAffix'),
  ),
);

if ($ACT == 'admin') {
  $JSINFO['bootstrap3']['admin'] = $INPUT->str('page');
}
