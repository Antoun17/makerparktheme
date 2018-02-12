jQuery(document).ready(function($) {
  // page is now ready, initialize the calendar..
     $('#calendar').fullCalendar({
         weekends: false,
         dayClick: function() {
           alert('a day has been clicked!');
         },
         defaultView: 'agendaWeek'

     });



 });
