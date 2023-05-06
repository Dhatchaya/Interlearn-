<?php $this->view("includes/header");?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/calendar.css?v=<?php echo time(); ?>">

  <body>
    <div class="calendar_wrapper">
      <header class = "calendar_header">
        <p class="current-date"></p>
        <div class="calendar_icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
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