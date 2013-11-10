<?php use_javascript("jquery.qtip.min.js")?>
<?php use_javascript("jMonthCalendar.min.js")?>
<?php use_javascript("events/events.js")?>
<?php use_stylesheet("jquery.qtip.min.css")?>
<?php use_stylesheet("events/events.css")?>
<?php use_stylesheet("news/news.css")?>
<?php use_stylesheet("events/core.css")?>


<div class="separator-line"></div>
<div class="introline">
	<div class="intro-text" >
		<h3><span>Calendario AES</span></h3>
		<p>Cursos, examenes y torneos. Cronograma oficial de AES</p>
	</div>
</div>
<div class="separator-line"></div>

<div id="calendarContainer">
	<div id="jMonthCalendar"></div>
</div>
<div class="news-list">
		<?php include_partial("eventList",array("pager"=>$pager))?>
</div>


