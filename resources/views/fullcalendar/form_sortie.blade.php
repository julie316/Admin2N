<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href='{{ asset("fullcalender/lib/main.css")}}' rel='stylesheet' />
<script src='{{ asset("fullcalender/lib/main.js")}}'></script>
<script src='{{ asset("fullcalender/lib/locales-all.js")}}'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'fr';
    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay,listMonth' // grille d'affichage du mois/semaine/jour
      },
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [ // Création des évènements dans le calendrier
        @foreach($search as $total)
          {
            title: '.Total Sorti: {{$total->sum}} FCFA',
            start: '{{$total->date_sort_cais}}'
          },
        @endforeach
        @foreach($sortie as $sort)
          {
            title: '{{$sort->rubrique->libelle_rub.' - '.$sort->libelle_sort_cais}}',
            start: '{{$sort->date_sort_cais}}',
            end: '{{$sort->date_sort_cais}}',
            backgroundColor: '{{$sort->rubrique->couleur}}', //appliquer une couleur à l'arriere-plan
            display: 'list-item' // affichage sous forme de listes
          },
        @endforeach
      ]
    });

    calendar.render();
    
  });

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }

  #calendar {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
