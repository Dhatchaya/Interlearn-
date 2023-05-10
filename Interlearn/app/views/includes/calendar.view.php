<?php $this->view("includes/header");?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/calendar.css?v=<?php echo time(); ?>">

  <body>
    <div class="calendar_wrapper">
      <header class = "calendar_header">
        <p class="current-date"></p>
        <div class="calendar_icons">
          <span id="prev" class="material-symbols-rounded">     <img src="<?=ROOT?>/assets/images/sidebar_icons/chevron_left.png" alt="picture"/></span>
          <span id="next" class="material-symbols-rounded"><img src="<?=ROOT?>/assets/images/sidebar_icons/chevron_right.png" alt="picture"/></span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
  </body>
</html>