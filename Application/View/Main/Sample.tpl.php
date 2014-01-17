<?php
/**
 * @var \Sohoa\Framework\View\Greut $this;
 * 
 */

$this->inherits('Layout/Base.tpl.php');
$this->block('c');
?>

<p>Hello world</p>
<p><?php echo $sample; ?></p>
<?php
$this->endblock();
?>