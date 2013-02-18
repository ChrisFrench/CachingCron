<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$url = "http://www.dioscouri.com/";
if ($amigosid = Cachingcron::getInstance()->get( 'amigosid', '' ))
{
    $url .= "?amigosid=".$amigosid; 
}
?>

<p align="center" <?php echo @$this->style; ?> >
	<?php echo JText::_( 'COM_CACHINGCRON_POWERED_BY' )." <a href='{$url}' target='_blank'>".JText::_( 'Cachingcron' )."</a>"; ?>
</p>

